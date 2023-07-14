// sidebar-menu
$(".sidebar ul li").on('click', function(){
    $(".sidebar ul li.active").removeClass('active');
    $(this).addClass('active');
});
// sidebar-menu selesai

// button sidebar on
const btn = document.getElementById('btnside');
const sidebar = document.getElementsByClassName('sidebar')[0];
const conten = document.getElementById('content');

btn.onclick = (function(){
  sidebar.classList.toggle('hide');
  sidebar.classList.toggle('aktif');
});
// button sidebar on selesai

