// SIDEBAR TOGGLE
let sidebarOpen = false;
const sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = false;
  }
}

// ---------- CHARTS ----------

// BAR CHART
const barChartOptions = {
  series: [
    {
      data: [10, 8],
      name: 'Products',
    },
  ],
  chart: {
    type: 'bar',
    background: 'transparent',
    height: 350,
    toolbar: {
      show: false,
    },
  },
  colors: ['#008000', '#FF0000'], // Green for Solved Cases, Red for Pending Cases
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: '40%',
    },
  },
  dataLabels: {
    enabled: false,
  },
  fill: {
    opacity: 1,
  },
  grid: {
    borderColor: '#55596e',
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: '#f5f7ff',
    },
    show: true,
    position: 'top',
  },
  stroke: {
    colors: ['transparent'],
    show: true,
    width: 2,
  },
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
  xaxis: {
    categories: ['Solved Cases', 'Pending Cases'],
    title: {
      style: {
        color: '#FF0000', // Red color for x-axis title
      },
    },
    axisBorder: {
      show: true,
      color: '#55596e',
    },
    axisTicks: {
      show: true,
      color: '#0000FF', // Blue color for x-axis ticks
    },
    labels: {
      style: {
        colors: '#f5f7ff',
      },
    },
  },
  yaxis: {
    title: {
      text: 'Count',
      style: {
        color: '#f5f7ff',
      },
    },
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      style: {
        colors: '#f5f7ff',
      },
    },
  },
};

const barChart = new ApexCharts(document.querySelector('#bar-chart'), barChartOptions);
barChart.render();

// AREA CHART
const areaChartOptions = {
  series: [
    {
      name: 'Solved Cases',
      data: [31, 40], // Placeholder data
    },
    {
      name: 'Pending Cases',
      data: [11, 32], // Placeholder data
    },
  ],
  chart: {
    type: 'area',
    background: 'transparent',
    height: 350,
    stacked: false,
    toolbar: {
      show: false,
    },
  },
  colors: ['#008000', '#FF0000'], // Green for Solved Cases, Red for Pending Cases
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'], // Placeholder labels
  dataLabels: {
    enabled: false,
  },
  fill: {
    gradient: {
      opacityFrom: 0.4,
      opacityTo: 0.1,
      shadeIntensity: 1,
      stops: [0, 100],
      type: 'vertical',
    },
    type: 'gradient',
  },
  grid: {
    borderColor: '#55596e',
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: '#f5f7ff',
    },
    show: true,
    position: 'top',
  },
  markers: {
    size: 6,
    strokeColors: '#0000FF', // Blue color for markers
    strokeWidth: 3,
  },
  stroke: {
    curve: 'smooth',
  },
  xaxis: {
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      offsetY: 5,
      style: {
        colors: '#FFFFFF', // Blue color for x-axis labels
      },
    },
  },
  yaxis: [
    {
      title: {
        text: 'Solved Cases',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
      },
    },
    {
      opposite: true,
      title: {
        text: 'Pending Cases',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
};

const areaChart = new ApexCharts(document.querySelector('#area-chart'), areaChartOptions);
areaChart.render();

// Function to fetch and update chart data
function updateChartData() {
  // Make AJAX request to fetch data
  fetch('fetch_cases.php')
    .then(response => response.json())
    .then(data => {
      // Update total cases reported
      document.getElementById('total-cases').innerText = data.total_cases;
      // Update pending cases
      document.getElementById('pending-cases').innerText = data.pending_cases;
      // Update solved cases
      document.getElementById('solved-cases').innerText = data.solved_cases;

      // Update bar chart data
      barChart.updateSeries([
        {
          name: 'Products', // Change series name if necessary
          data: [data.solved_cases, data.pending_cases],
        },
      ]);

      // Update area chart data (if needed)
      areaChart.updateSeries([
        {
          name: 'Solved Cases',
          data: [data.solved_cases],
        },
        {
          name: 'Pending Cases',
          data: [data.pending_cases],
        },
      ]);
    })
    .catch(error => console.error('Error fetching data:', error));
}

// Call updateChartData function initially and then set an interval to update data periodically
updateChartData(); // Initial call

// Set interval to update data every X milliseconds (e.g., every 5 minutes)
setInterval(updateChartData, 300000); // 300000 milliseconds = 5 minutes
