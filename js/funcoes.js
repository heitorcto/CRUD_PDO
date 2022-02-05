// FUNÇÃO PARA APLICAR ZOOM E COR A LOGO DO PROJETO AO EFETUAR UMA AÇÃO
function cadastro(){
    document.getElementById("img_pb").classList.add("img_pb_ativo");
    setTimeout(()=>{
        document.querySelector("form").submit();
    }, 1500)
}


// FUNÇÃO QUE EMITE UM GRÁFICO
var ling1 = document.getElementById("ling1").value;
var ling2 = document.getElementById("ling2").value;
console.log(ling1)
var linguagens = [ling1, ling2];
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: linguagens,
        datasets: [{
            label: 'Discussões',
            data: [12, 19, 3, 5, 2],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});