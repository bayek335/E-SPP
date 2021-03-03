
var tbl_show_pwd = document.querySelector('#tbl-show-pwd')
var pwd = document.querySelector('#pwd')

function show_pwd(){
    if (pwd.getAttribute('type')=='password') {
    pwd.setAttribute('type', 'text');
    tbl_show_pwd.classList.replace('fa-eye', 'fa-eye-slash')
    }else{
    pwd.setAttribute('type', 'password');
    tbl_show_pwd.classList.replace('fa-eye-slash', 'fa-eye')
    }
}

var tbltoggle = document.querySelector('#tbl-toggle');
var bgdark = document.querySelector('.background-dark')
var spantgl = document.querySelector('#tbl-toggle span')
var spantgl1 = document.querySelector('#tbl-toggle span:nth-child(2)')
var spantgl2 = document.querySelector('#tbl-toggle span:last-child')
var sidebar = document.querySelector('.sidebar');
tbltoggle.onclick = function(){
    if(sidebar.getAttribute('style')==null){
        sidebar.style.transform = "translateX(0px)"
        bgdark.classList.add('background-dark-active')
        spantgl.classList.add('span-slide')
        spantgl1.classList.add('span-slide')
        spantgl2.classList.add('span-slide')
    }else{
        sidebar.removeAttribute('style')
        bgdark.classList.remove('background-dark-active')
        spantgl.classList.remove('span-slide')
        spantgl1.classList.remove('span-slide')
        spantgl2.classList.remove('span-slide')
    }
}
bgdark.onclick = function(){
    if(sidebar.getAttribute('style')!=null){
        sidebar.removeAttribute('style')
        bgdark.classList.remove('background-dark-active')
        spantgl.classList.remove('span-slide')
        spantgl1.classList.remove('span-slide')
        spantgl2.classList.remove('span-slide')
    }
}   
    
function tblmenu1 () {
    
    var smenu = document.querySelector('#smenu1  ul.smenu');
    var ikon = document.querySelector('#smenu1 a i.fa.fa-chevron-right');
    
    smenu.classList.toggle('active')
    ikon.classList.toggle('active')
}

function tblmenu2 () {
    var smenu = document.querySelector('#smenu2  ul.smenu');
    var ikon = document.querySelector('#smenu2 a i.fa.fa-chevron-right');
    smenu.classList.toggle('active')
    ikon.classList.toggle('active')
}



var active = document.querySelectorAll('.sidebar ul li.menu a');
this.active.onclick = function(){
    console.log()
}

function konfirmasi(e, pesan){
    var r = window.confirm(pesan)
    if (r == false) {
        e.preventDefault()
    }
}


// Ajax cari
var tbl_cari = document.querySelector('#cari');
var tabel =  document.querySelector('#data-tbl');
tbl_cari.addEventListener('change', function(){

    var level = document.querySelector('#user-level').dataset.level
    console.log(level)
    if (level == 'admin') {
        var url_cetak_siswa = 'http://localhost/spp_06/public/'+'siswa/cetaksiswa.php?idk='+this.value
        var tbl_cetak_siswa =document.querySelector('#tbl-cetak-siswa');
        tbl_cetak_siswa.setAttribute('href', url_cetak_siswa)
    }


    var keyword = this.value;
    var xhr = new XMLHttpRequest();
    var url = 'http://localhost/spp_06/public/'+'siswa/ajax-cari.php?idk='+keyword;

    xhr.onreadystatechange = function(){
        if (this.readyState==4 && this.status == 200) {
            tabel.innerHTML = this.responseText;
        }
    }
    xhr.open("GET", url, true);
    xhr.send();

})
