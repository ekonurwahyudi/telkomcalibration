document.addEventListener('DOMContentLoaded', function() {
  // Find all range inputs in the survey form
  const rangeInputs = document.querySelectorAll('input[type="range"].form-range');
  
  // Replace each range input with star rating
  rangeInputs.forEach(function(rangeInput) {
    const id = rangeInput.id;
    const name = rangeInput.name;
    const min = parseInt(rangeInput.min) || 1;
    const max = parseInt(rangeInput.max) || 5;
    const value = rangeInput.value || 0;
    const parentDiv = rangeInput.parentNode;
    
    // Create star rating container
    const starContainer = document.createElement('div');
    starContainer.className = 'star-rating';
    
    // Create stars (in reverse order for CSS to work properly)
    for (let i = max; i >= min; i--) {
      const radioInput = document.createElement('input');
      radioInput.type = 'radio';
      radioInput.id = id + '-' + i;
      radioInput.name = name;
      radioInput.value = i;
      
      // Set default value if it matches
      if (parseInt(value) === i) {
        radioInput.checked = true;
      }
      
      const label = document.createElement('label');
      label.setAttribute('for', id + '-' + i);
      label.title = i;
      
      starContainer.appendChild(radioInput);
      starContainer.appendChild(label);
    }
    
    // Create text labels for the rating scale
    const ratingText = document.createElement('div');
    ratingText.className = 'star-rating-text';
    //ratingText.innerHTML = '<span>Tidak Penting (1)</span><span>Sangat Penting (5)</span>';
    
    // Replace the range input with the star rating
    parentDiv.removeChild(rangeInput);
    parentDiv.appendChild(starContainer);
    parentDiv.appendChild(ratingText);
  });
});