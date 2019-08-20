/**
 * Created by sts on 20/01/18.
 */
(function() {
    'use strict';

    angular.module('tableSort', [])
        .directive('tsBody', function( $log, $parse ) {
            return {
                scope: true,
                controller: ['$scope', function($scope) {
                    $scope.sortExpression = [];
                    $scope.headings = [];

                    var parse_sortexpr = function( expr ) {
                        return [$parse( expr ), null, false];
                    };

                    this.setSortField = function(sortexpr, element, $index) {
                        console.log($index);
                        var i;
                        var expr = parse_sortexpr( sortexpr );

                        if( $scope.sortExpression.length === 1
                            && $scope.sortExpression[0][0] === expr[0] ) {
                            if( $scope.sortExpression[0][2] ) {

                                element.removeClass( "tablesort-desc" );
                                element.addClass( "tablesort-asc" );
                                $scope.sortExpression[0][2] = false;
                            }
                            else {
                                element.removeClass( "tablesort-asc" );
                                element.addClass( "tablesort-desc" );
                                $scope.sortExpression[0][2] = true;
                            }
                        }
                        else {
                            for( i=0; i<$scope.headings.length; i=i+1 ) {
                                if(i != $index+1) {
                                    $scope.headings[i]
                                        .removeClass( "tablesort-sortable" )
                                        .removeClass( "tablesort-desc" )
                                        .removeClass( "tablesort-asc" )
                                        .addClass( "table-sort-up-down" );
                                }
                            }
                            element.addClass( "tablesort-sortable" );
                            element.addClass( "tablesort-asc" );
                            element.removeClass( "table-sort-up-down col-width" );
                            $scope.sortExpression = [expr];
                        }
                    };

                    this.addSortField = function( sortexpr, element ) {
                        var i;
                        var toggle_order = false;
                        var expr = parse_sortexpr( sortexpr );
                        for( i=0; i<$scope.sortExpression.length; i=i+1 ) {
                            if( $scope.sortExpression[i][0] === expr[0] ) {
                                if( $scope.sortExpression[i][2] ) {
                                    element.removeClass( "tablesort-desc" );
                                    element.addClass( "tablesort-asc" );
                                    $scope.sortExpression[i][2] = false;
                                }
                                else {
                                    element.removeClass( "tablesort-asc" );
                                    element.addClass( "tablesort-desc" );
                                    $scope.sortExpression[i][2] = true;
                                }
                                toggle_order = true;
                            }
                        }

                        if( !toggle_order ) {
                            element.addClass( "tablesort-asc" );
                            $scope.sortExpression.push( expr );
                        }
                    };

                    this.setTrackBy = function( trackBy ) {
                        $scope.trackBy = trackBy;
                    };

                    this.registerHeading = function( headingelement ) {
                        $scope.headings.push( headingelement );
                    };

                    $scope.sortFun = function( a, b ) {
                        var i, aval, bval, descending, filterFun;
                        for( i=0; i<$scope.sortExpression.length; i=i+1 ){
                            aval = $scope.sortExpression[i][0](a);
                            bval = $scope.sortExpression[i][0](b);
                            filterFun = b[$scope.sortExpression[i][1]];
                            if( filterFun ) {
                                aval = filterFun( aval );
                                bval = filterFun( bval );
                            }
                            if( aval === undefined ) {
                                aval = "";
                            }
                            if( bval === undefined ) {
                                bval = "";
                            }
                            descending = $scope.sortExpression[i][2];
                            if( aval > bval ) {
                                return descending ? -1 : 1;
                            }
                            else if( aval < bval ) {
                                return descending ? 1 : -1;
                            }
                        }

                        if( $scope.trackBy ) {
                            aval = a[$scope.trackBy];
                            bval = b[$scope.trackBy];
                            if( aval === undefined ) {
                                aval = "";
                            }
                            if( bval === undefined ) {
                                bval = "";
                            }
                            if( aval > bval ) {
                                return descending ? -1 : 1;
                            }
                            else if( aval < bval ) {
                                return descending ? 1 : -1;
                            }
                        }
                        return 0;
                    };
                }]
            };
        }).directive('tsCriteria', function() {
            return {
                require: "^tsBody",
                link: function(scope, element, attrs, tsBodyCtrl) {
                    var clickingCallback = function(event) {
                        scope.$apply( function() {
                            if( event.shiftKey ) {
                                tsBodyCtrl.addSortField(attrs.tsCriteria, element);
                            } else {
                                tsBodyCtrl.setSortField(attrs.tsCriteria, element);

                            }
                        } );
                    };
                    element.bind('click', clickingCallback);

                    if( "tsDefault" in attrs && attrs.tsDefault !== "0" ) {
                        element.addClass('tablesort-sortable');
                        tsBodyCtrl.addSortField( attrs.tsCriteria, element );
                        if( attrs.tsDefault == "desc" ) {
                            tsBodyCtrl.addSortField( attrs.tsCriteria, element );
                        }
                    } else {
                        element.addClass( "table-sort-up-down col-width" );
                        console.log("masuk disana")
                    }
                    tsBodyCtrl.registerHeading( element );
                }
            };
        }).directive("tsRepeat", ['$compile', function($compile) {
            return {
                terminal: true,
                require: "^tsBody",
                priority: 1000000,
                link: function(scope, element, attrs, tsBodyCtrl) {
                    var clone = element.clone();
                    var tdcount = element[0].childElementCount;
                    var repeatExpr = clone.attr("ng-repeat");
                    var trackBy = null;
                    var trackByMatch = repeatExpr.match(/\s+track\s+by\s+\S+?\.(\S+)/);
                    if( trackByMatch ) {
                        trackBy = trackByMatch[1];
                        tsBodyCtrl.setTrackBy(trackBy);
                    }
                    repeatExpr = repeatExpr.replace(/^\s*([\s\S]+?)\s+in\s+([\s\S]+?)(\s+track\s+by\s+[\s\S]+?)?\s*$/,
                        "$1 in $2 | tablesortOrderBy:sortFun$3");

                    element.html("<td colspan='"+tdcount+"'></td>");
                    element[0].className += " showIfLast";
                    clone.removeAttr("ts-repeat");

                    clone.attr("ng-repeat", repeatExpr);
                    var clonedElement = $compile(clone)(scope);
                    element.after(clonedElement);
                }
            };
        }]).filter( 'tablesortOrderBy', function(){
            return function(array, sortfun ) {
                if(!array) return;
                var arrayCopy = [];
                for ( var i = 0; i < array.length; i++) { arrayCopy.push(array[i]); }
                return arrayCopy.sort( sortfun );
            };
        }).filter('parseInt', function(){
            return function(input) {
                return parseInt( input );
            };
        }).filter('parseFloat', function(){
            return function(input) {
                return parseFloat( input );
            };
        } );

})();