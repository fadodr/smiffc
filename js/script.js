const ctx = document.getElementById("donationAnalytics");
const modal = document.getElementById("detailsModal");
const bloodDonorInfo = document.getElementById("bloodDonorInfo");
const bloodPatientInfo = document.getElementById("bloodPatientInfo");
const bloodInfo = document.getElementById("bloodInfo");

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

function openRecipientModal(
  dateDonated,
  donorName,
  donorBloodGroup,
  donorEmail,
  donorPhone,
  status,
  patient,
  reason
) {
  modal.classList.add("show");
  bloodDonorInfo.innerHTML = `<p>Donor Info:</p>
      <div class="details-content">
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Date</p>
            <p class="value" >${dateDonated}</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor</p>
            <p class="value">${donorName}</p>
          </div>
          <div class="content-item">
            <p class="detail">Blood Type</p>
            <p class="value blood">${donorBloodGroup}</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor Email</p>
            <p class="value">${donorEmail}</p>
          </div>
          <div class="content-item">
            <p class="detail">Donor Phone Number</p>
            <p class="value">${donorPhone}</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Status</p>
            <p class="value verified">${status}</p>
          </div>
        </div>
      </div>`;

  bloodPatientInfo.innerHTML = `<p>Patient Info:</p>
      <div class="details-content">
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Patient Name</p>
            <p class="value">${patient}</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Reason</p>
            <p class="value">${reason}</p>
          </div>
        </div>
      </div>`;
}

function openBloodModal(
  bloodBankId,
  dateDonated,
  donorName,
  donorBloodGroup,
  donorEmail,
  donorPhone,
  status,
) {
  modal.classList.add("show");
  bloodInfo.innerHTML = `<div class="details-content">
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Date</p>
            <p class="value">${dateDonated}</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor</p>
            <p class="value">${donorName}</p>
          </div>
          <div class="content-item">
            <p class="detail">Blood Type</p>
            <p class="value blood">${donorBloodGroup}</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Donor Email</p>
            <p class="value">${donorEmail}</p>
          </div>
          <div class="content-item">
            <p class="detail">Donor Phone Number</p>
            <p class="value">${donorPhone}</p>
          </div>
        </div>
        <div class="details-row">
          <div class="content-item">
            <p class="detail">Status</p>
            <p class="value ${status == 'pending' ? 'pending' : 'verified'}">${status}</p>
          </div>
        </div>
        </div>`;
        if(status == 'pending'){
           bloodInfo.innerHTML += `<div class="details-content">
             <div class="details-row">
              <form action="../../smiffb/database/confirm-blood.php" method="POST">
                <input type="text" name="blood_bank_id" value="${bloodBankId}" hidden/>
                <div class="content-item">
                  <button class="approval-btn" name="submit">Confirm Blood Approval</button>
                </div>
              </form>
            </div>
            </div>
          `;
        };
}

function closeModal() {
  modal.classList.remove("show");
}
