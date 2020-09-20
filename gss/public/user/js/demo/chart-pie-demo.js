// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


// AJAX Call

$.ajax({
    url: "/tickets-composition",
    method: "GET",
    success: function (data) {

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Painting", "Plumbing", "HouseKeeping", "Airconditioner", "Electrical", "Interior"],
                datasets: [{
                    data: data,
                    backgroundColor: ['#4e73df', '#FD0000', '#36b9cc', '#FDBB00', '#7B16EC', '#E418F1'],
                    hoverBackgroundColor: "rgba(0, 0, 0, 1)",
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true
                },
                cutoutPercentage: 80,
            },
        });
    }
});

