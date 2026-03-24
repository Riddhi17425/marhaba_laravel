<section class="home_mt-100">
    <div class="ym-container">
        <div class="container_main_girl">
            <div class="col_big">
                <div class="brand-grid" id="brand-grid-girl">
                    <!-- 6 cells -->
                    <div class="brand-cell">
                        <div class="brand-inner">
                            <img class="brand-img" src="" alt="Brand Logo" class="img-fluid">
                            <div class="brand-overlay"><span></span></div>
                        </div>
                    </div>
                    <div class="brand-cell">
                        <div class="brand-inner">
                            <img class="brand-img" src="" alt="Brand Logo" class="img-fluid">
                            <div class="brand-overlay"><span></span></div>
                        </div>
                    </div>
                    <div class="brand-cell">
                        <div class="brand-inner">
                            <img class="brand-img" src="" alt="Brand Logo" class="img-fluid">
                            <div class="brand-overlay"><span></span></div>
                        </div>
                    </div>
                    <div class="brand-cell">
                        <div class="brand-inner">
                            <img class="brand-img" src="" alt="Brand Logo" class="img-fluid">
                            <div class="brand-overlay"><span></span></div>
                        </div>
                    </div>
                    <div class="brand-cell">
                        <div class="brand-inner">
                            <img class="brand-img" src="" alt="Brand Logo" class="img-fluid">
                            <div class="brand-overlay"><span></span></div>
                        </div>
                    </div>
                    <div class="brand-cell">
                        <div class="brand-inner">
                            <img class="brand-img" src="" alt="Brand Logo" class="img-fluid">
                            <div class="brand-overlay"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col_small">
                <div>
                    <h2 class="title_60lora" style=" white-space: nowrap; ">Girls Collection </h2>
                    <a href="{{ route('get.products', ['type' => 'girl']) }}" class="btn_1 mx-auto" target="_blank">All
                        Girls Products<img loading="lazy" src="{{ asset('public/front/img/Home/blue-arr.svg') }}" alt=""
                            height="10" width="10"></a>
                </div>
                <div class="hero_img_wrapper">
                    <img loading="lazy" src="{{ asset('public/front/img/Home/all-girl.png') }}" alt="all-girl">
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {

//   const brands = [
//     { src: "{{ asset('public/front/img/Home/Comfort-Palazzo-Set.png') }}",            name: "Comfort Palazzo Set" },
//     { src: "{{ asset('public/front/img/Home/Loungewear-Set-girl.png') }}",                  name: "Loungewear Set" },
//     { src: "{{ asset('public/front/img/Home/Pyjama-Set.png') }}",        name: "Pyjama-Set" },
//     { src: "{{ asset('public/front/img/Home/classic-dress.png') }}",        name: "Classic Dress" },
//     { src: "{{ asset('public/front/img/Home/Top-Leggings-Set.png') }}",                      name: "Top & Leggings Set" },
//     { src: "{{ asset('public/front/img/Home/Classic-Palazzo-Set.png') }}",           name: "Classic-Palazzo-Set" },
//     { src: "{{ asset('public/front/img/Home/Casual-Dungaree-Set.png') }}",  name: "Casual-Dungaree-Set" },
//   ];
  const brands = @json($girlsRandomImg);
  const cells = document.querySelectorAll('#brand-grid-girl .brand-cell');
  const TOTAL = cells.length; // 6

  // Fisher-Yates shuffle (in-place)
  function shuffle(arr) {
    for (let i = arr.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [arr[i], arr[j]] = [arr[j], arr[i]];
    }
    return arr;
  }

  // Shuffle all 7 indices, assign first 6 to cells, keep last 1 as hidden
  const allIndices = [0, 1, 2, 3, 4, 5, 6];
  shuffle(allIndices);

  // visibleOrder[cellIndex] = brandIndex shown in that cell
  const visibleOrder = allIndices.slice(0, TOTAL);
  // hiddenIndex = the brand sitting "off screen", waiting to rotate in
  let hiddenIndex = allIndices[TOTAL];

  function renderCell(cellIndex, brandIndex) {
    const img   = cells[cellIndex].querySelector('.brand-img');
    const label = cells[cellIndex].querySelector('.brand-overlay span');
    img.src           = brands[brandIndex].src;
    img.alt           = brands[brandIndex].name;
    label.textContent = brands[brandIndex].name;
  }

  // Initial render
  visibleOrder.forEach((brandIdx, cellIdx) => renderCell(cellIdx, brandIdx));

  // Paused cells (hovered or tapped)
  const pausedCells = new Set();

  // Every 2s: pick 1 random non-paused cell → swap it with the hidden brand
  setInterval(() => {
    const available = [...Array(TOTAL).keys()].filter(i => !pausedCells.has(i));
    if (available.length < 1) return;

    // Pick a random available cell
    const cellIdx = available[Math.floor(Math.random() * available.length)];

    const img   = cells[cellIdx].querySelector('.brand-img');
    const label = cells[cellIdx].querySelector('.brand-overlay span');

    img.classList.add('fade-out');

    setTimeout(() => {
      // The brand leaving this cell becomes the new hidden brand
      const outgoing    = visibleOrder[cellIdx];
      visibleOrder[cellIdx] = hiddenIndex;
      hiddenIndex       = outgoing;

      img.src           = brands[visibleOrder[cellIdx]].src;
      img.alt           = brands[visibleOrder[cellIdx]].name;
      label.textContent = brands[visibleOrder[cellIdx]].name;

      img.classList.remove('fade-out');
    }, 500);

  }, 2000);

  // Desktop hover pause (>=1240px)
  cells.forEach((cell, i) => {
    cell.addEventListener('mouseenter', () => {
      if (window.innerWidth >= 1240) pausedCells.add(i);
    });
    cell.addEventListener('mouseleave', () => {
      pausedCells.delete(i);
    });
  });

  // Mobile tap pause
  cells.forEach((cell, i) => {
    cell.addEventListener('click', () => {
      if (window.innerWidth >= 1240) return;

      if (cell.classList.contains('tapped')) {
        cell.classList.remove('tapped');
        pausedCells.delete(i);
      } else {
        cells.forEach((c, j) => {
          if (j !== i) { c.classList.remove('tapped'); pausedCells.delete(j); }
        });
        cell.classList.add('tapped');
        pausedCells.add(i);
      }
    });
  });

  // Tap outside to dismiss on mobile
  document.addEventListener('click', (e) => {
    if (window.innerWidth >= 1240) return;
    if (!e.target.closest('.brand-cell')) {
      cells.forEach((c, j) => { c.classList.remove('tapped'); pausedCells.delete(j); });
    }
  });

});
</script>