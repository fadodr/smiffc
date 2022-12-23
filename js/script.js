const ctx = document.getElementById("donationAnalytics");
const modal = document.getElementById("detailsModal");
const donorInfo = document.getElementById("donorInfo")

new Chart(ctx, {
  type: "line",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sept",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        label: "Activity",
        fill: false,
        data: [50, 60, 70, 80, 90, 80, 70, 60, 50, 40, 50, 60, 70],
        lineTension: 0,
        pointRadius: 1,
        pointHoverRadius: 10,
        borderColor: "#880808",
        borderWidth: 2,
      },
      {
        label: "Activity",
        fill: false,
        data: [70, 80, 90, 80, 70, 60, 50, 40, 50, 60, 70, 80, 90],
        lineTension: 0,
        pointRadius: 1,
        pointHoverRadius: 10,
        borderColor: "#A155B9",
        borderWidth: 2,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: { display: false },
    scales: {
      x: {
        grid: {
          display: false,
        },
      },
      y: {
        grid: {
          display: false,
        },
      },
    },
    plugins: {
      legend: {
        display: false,
      },
      tooltips: {
        callbacks: {
          label: (tooltipItem) => {
            return tooltipItem.yLabel;
          },
        },
      },
    },
  },
});

function toggleModal(data) {
  modal.classList.toggle("show");
  console.log(data);
}


function openRecipientModal(data) {
  modal.classList.add("show")
  donorInfo.innerHTML = `<p>Donor Info:</p>
      <div class="details-content">
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Date</p>
            <p class="value" >${data}</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor</p>
            <p class="value">Atanda Damilare</p>
          </div>
          <div class="content-item">
            <p class="detail">Blood Type</p>
            <p class="value blood">O+</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor Email</p>
            <p class="value">atandadray@gmail.com</p>
          </div>
          <div class="content-item">
            <p class="detail">Donor Phone Number</p>
            <p class="value">08123456789</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Status</p>
            <p class="value verified">• Verified</p>
          </div>
        </div>
      </div>`;
}

function closeRecipientModal() {
  modal.classList.remove("show");
}