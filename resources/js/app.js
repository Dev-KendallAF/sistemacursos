import './bootstrap';
import $ from "jquery";
import DataTable from 'datatables.net-dt';
import AOS from 'aos';
import 'aos/dist/aos.css';

setTimeout(()=>
{
    AOS.init();

},1000)
import './utilities/dropdown';
import './utilities/maskInput';


 




$(function() {
    if ($('#table').length)
    {
        let table = new DataTable('#table',
            {
                responsive: true,
                info: false,

                "language": {
                    "search": `<i class="fa-solid fa-magnifying-glass"></i> Buscar: `,
                    "lengthMenu": "Mostrar _MENU_ ",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros en total)",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "<i class='fa-solid fa-angle-right'></i>",
                        "previous": "<i class='fa-solid fa-angle-left'></i>"
                    },

                }
            });
        }

    //Opciones del tema
    const userTheme = localStorage.getItem("theme");
    const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

    $("body").addClass(userTheme === "dark" || (!userTheme && systemTheme) ? "darkMode" : "lightMode");
    $("html").toggleClass("dark", userTheme === "dark" || (!userTheme && systemTheme));

    //validaciones 


});

