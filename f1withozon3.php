<?php
  $pageTitle = "F1 with Ozon3 | Live Race Timing";
  include('includes/header.php');
?>

<section class="py-20 px-6 text-center bg-zinc-900 min-h-screen">
  <h2 class="text-5xl font-bold text-red-500 mb-6">F1 with Ozon3</h2>
  <p class="text-gray-300 text-lg max-w-2xl mx-auto mb-8">
    Live and recent Formula 1 race timing data — powered by <a href="https://openf1.org/" target="_blank" class="text-red-400 hover:underline">OpenF1 API</a>.
  </p>

  <div id="status" class="text-gray-400 mb-4">Fetching latest session...</div>

  <div class="overflow-x-auto max-w-5xl mx-auto">
    <table id="timingTable" class="w-full text-left bg-zinc-800 rounded-lg overflow-hidden hidden">
      <thead class="bg-zinc-700 text-gray-200">
        <tr>
          <th class="px-4 py-2">Pos</th>
          <th class="px-4 py-2">Driver</th>
          <th class="px-4 py-2">Team</th>
          <th class="px-4 py-2">Lap</th>
          <th class="px-4 py-2">Gap</th>
        </tr>
      </thead>
      <tbody id="timingBody"></tbody>
    </table>
  </div>

  <div id="noData" class="text-gray-400 mt-8 hidden">
    No timing data available at the moment.
  </div>
</section>

<script>
let sessionKey = null;
let isLive = false;

// 🧠 Get latest or recent session key
async function getLatestSession() {
  try {
    const res = await fetch('https://api.openf1.org/v1/sessions?year=2025');
    const sessions = await res.json();

    // Check for any live sessions
    const live = sessions.find(s => 
      s.session_status?.toLowerCase().includes("active") || 
      s.session_status?.toLowerCase().includes("started")
    );
    if (live && live.session_key) {
      isLive = true;
      return live.session_key;
    }

    // Fallback to latest completed race
    const raceSessions = sessions.filter(s => s.session_name?.toLowerCase().includes("race"));
    const latest = raceSessions.sort((a,b) => new Date(b.date_end) - new Date(a.date_end))[0];
    if (latest && latest.session_key) {
      isLive = false;
      return latest.session_key;
    }

    return null;
  } catch (err) {
    console.error("Session fetch error:", err);
    return null;
  }
}

// 🧠 Get timing data (live or last)
async function getTimingData(key) {
  try {
    const endpoint = isLive
      ? `https://api.openf1.org/v1/live_timing?session_key=${key}`
      : `https://api.openf1.org/v1/position?session_key=${key}`;
    const res = await fetch(endpoint);
    return await res.json();
  } catch (err) {
    console.error("Timing fetch error:", err);
    return [];
  }
}

// 🧠 Render the data table
async function renderTiming() {
  const status = document.getElementById('status');
  const tbody = document.getElementById('timingBody');
  const table = document.getElementById('timingTable');
  const noData = document.getElementById('noData');

  if (!sessionKey) {
    sessionKey = await getLatestSession();
    if (!sessionKey) {
      status.textContent = "⚠️ Could not determine session key.";
      table.classList.add('hidden');
      noData.classList.remove('hidden');
      return;
    }
  }

  const data = await getTimingData(sessionKey);
  tbody.innerHTML = '';

  if (!data || data.length === 0) {
    table.classList.add('hidden');
    noData.classList.remove('hidden');
    status.textContent = "No timing data available.";
    return;
  }

  table.classList.remove('hidden');
  noData.classList.add('hidden');
  status.textContent = isLive ? "🏁 Live Race Updating Every Second" : "Showing Last Recorded Race Data";

  // Normalize data
  let list = [];
  if (isLive) {
    list = data;
  } else {
    // Group by driver and keep last entry per driver for recent sessions
    const seen = {};
    for (let i = data.length - 1; i >= 0; i--) {
      const d = data[i];
      if (!seen[d.driver_number]) {
        seen[d.driver_number] = d;
      }
    }
    list = Object.values(seen);
  }

  list.sort((a,b) => (a.position ?? 99) - (b.position ?? 99));

  list.forEach(d => {
    const tr = document.createElement('tr');
    tr.className = 'border-t border-zinc-700 hover:bg-zinc-700 transition';
    tr.innerHTML = `
      <td class="px-4 py-2 font-semibold text-red-400">${d.position ?? '-'}</td>
      <td class="px-4 py-2 text-white">${d.driver_number ? d.driver_number + ' - ' : ''}${d.driver_name ?? 'N/A'}</td>
      <td class="px-4 py-2 text-gray-300">${d.team_name ?? '-'}</td>
      <td class="px-4 py-2 text-gray-300">${d.lap_number ?? '-'}</td>
      <td class="px-4 py-2 text-gray-300">${d.gap_to_leader ?? '-'}</td>
    `;
    tbody.appendChild(tr);
  });
}

// ⏱ Refresh every second
renderTiming();
setInterval(renderTiming, 1000);
</script>

<?php include('includes/footer.php'); ?>
