
// $(document).ready(function(){
//     alert("primero");
// });

function certificar()
    {
        var c = document.getElementById("certificado");
        var ctx = c.getContext("2d");
        
        var img = document.getElementById("fondo");
        ctx.drawImage(img, 0, 0, c.width, c.height);

        ctx.font = '30px Arial';
        //ctx.fillText('nombre', 40, 180);
        //ctx.fillText(<?= json_encode($nombre) ?>, 300, 380);

        console.log($student);
    }
    
    function png()
    {
        var canvas = document.getElementById("certificado");
        var ctx = canvas.getContext('2d');
        let lblpng = document.createElement('a');
        lblpng.download = "Certificado.png";
        lblpng.href = canvas.toDataURL();
        lblpng.click();
        //console.log("png");
    }

// function certificar()
//     {
//         var c = document.getElementById("certificado");
//         var ctx = c.getContext("2d");
        
//         var img = document.getElementById("fondo");
//         ctx.drawImage(img, 0, 0, c.width, c.height);

//         ctx.font = '30px Arial';
//         //ctx.fillText('nombre', 40, 180);
//         //ctx.fillText(<?= json_encode($nombre) ?>, 300, 380);

//         // console.log($student);
//     }
    
//     function png()
//     {
//         var canvas = document.getElementById("certificado");
//         var ctx = canvas.getContext('2d');

//         let lblpng = document.createElement('a');
//         lblpng.download = "Certificado.png";
//         lblpng.href = canvas.toDataURL();
//         lblpng.click();
//         //console.log("png");
//     }


    document.addEventListener("DOMContentLoaded", () =>{
        const $boton = document.querySelector("btnpdf");
        $boton.addEventListener("click", () =>{
            const $ElementoParaConvertir = document.canvas;
            html2pdf()
                .set({
                    margin: 1,
                    filename: 'certificado.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98,
                    },
                    html2canvas: {
                        scale: 3,
                        letterRendering: true,
                    },
                    jsPDF: {
                        unit: "in",
                        format: "a3",
                        orientation: 'portrait'
                    }
                })
                .from($ElementoParaConvertir)
                .save()
                .catch(err => console.log(err))
                .finally()
                .then(() => {
                    console.log("Guardado")
                });
        });
    });

//     function pdf()
//     {

//         //import jsPDF from 'jspdf';

//         var imgData = canvas.toDataURL('image/png');
//         var doc = new jsPDF('l', 'mm');
//         doc.addImage(imgData, 'PNG', 30, 15);
//         doc.save('certificado.pdf');
//         //window.print();

//     }