// Look for all 'contacts__entry' items, add click eventlistener to them
document.querySelectorAll('.contacts__entry').forEach(item => {
  item.addEventListener('click', event => {
    if (item.classList.contains('selected')) {
      item.classList.remove('selected');
    } else {
      item.classList.add('selected');
    }
  })
})

// Look for all 'plan' items, add click eventlistener to them
let planItems = document.querySelectorAll('.plan');
planItems.forEach(item => {
  item.addEventListener('click', event => {
    if (item.classList.contains('active') !== true) {
      // Clear all 'active' states.
      planItems.forEach(item => {
        if (item.classList.contains('active')) {
          item.classList.remove('active');
        }
      })

      // Then, add it to the selected one.
      item.classList.add('active');
    }
  })
})
