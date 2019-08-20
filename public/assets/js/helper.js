function confirmDelete(message, callback) {
    return swal({
        title: "Apakah anda yakin?",
        text: message, 
        icon: "warning",
        buttons: ["Tidak", "Ya"],
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        callback();
      }
    });
}

function confirmRestore(message, callback) {
    return swal({
        title: "Apakah anda yakin?",
        text: message, 
        icon: "warning",
        buttons: ["Tidak", "Ya"],
        dangerMode: false,
    })
    .then((willDelete) => {
      if (willDelete) {
        callback();
      }
    });
}

function successAlert(message) {
    swal("Berhasil!", message, "success");
}

function errorAlert(message) {
    swal("Gagal!", message, "error");
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

function validatePhoneNumber(phone) {
    var re =  /^\d+$/;
    return re.test(String(phone).toLowerCase());
};

function formatDateDBToDisplay(date) {
    if(date == null)
        return '';
    if(date.length < 8)
        return '';
    return date.substring(6, 8)+'/'+date.substring(4, 6)+'/'+date.substring(0, 4);
}

function formatDateDBToISO(date) {
    if(date == null)
        return '';
    if(date.length < 8)
        return '';
    return date.substring(0, 4)+'-'+date.substring(4, 6)+'-'+date.substring(6, 8);
}

function dateClassDBtoDisplay(d) {
    // console.log(d);
    if(d === undefined)
        return '';
    if(d == null || d == '')
        return '';
    var month = '' + (d.getMonth()+1),
    day = '' + d.getDate(),
    year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return year+month+day;
}

function dateDBtoClass(d) {
    var date = formatDateDBToISO(d);
    if(date == '')
        return '';
    return new Date(d);
}

function getValueById(id, array) {
    var index = array.findIndex(x => x.id==id);
        if(index == -1) 
            return '';
        return array[index].value;
}

function dd( status ) {
    alert(JSON.stringify(status));
}