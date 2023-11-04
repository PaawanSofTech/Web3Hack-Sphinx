document.addEventListener("DOMContentLoaded", function() {
  var itemList = document.getElementsByClassName("item-list")[0];
  var items = itemList.getElementsByClassName("item-container");
  var showMoreBtn = document.getElementById("show-more-btn");
  var showLessBtn = document.getElementById("show-less-btn");
  var goToTopBtn = document.getElementById("go-to-top");
  var visibleItemCount = 3;
  var initialVisibleCount = visibleItemCount;
  var currentVisibleCount = visibleItemCount;

  function showMore() {
    for (var i = currentVisibleCount; i < currentVisibleCount + visibleItemCount; i++) {
      if (items[i]) {
        items[i].style.display = "flex";
      }
    }

    currentVisibleCount += visibleItemCount;

    if (currentVisibleCount >= items.length) {
      showMoreBtn.style.display = "none";
    }

    showLessBtn.style.display = "inline-block";
  }

  function showLess() {
    for (var i = initialVisibleCount; i < items.length; i++) {
      items[i].style.display = "none";
    }

    currentVisibleCount = initialVisibleCount;

    showMoreBtn.style.display = "inline-block";
    showLessBtn.style.display = "none";
  }

  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }

  // Show initial items
  for (var i = 0; i < initialVisibleCount; i++) {
    items[i].style.display = "flex";
  }

  // Hide items beyond initialVisibleCount
  for (var i = initialVisibleCount; i < items.length; i++) {
    items[i].style.display = "none";
  }

  // Hide "Show Less" button initially
  showLessBtn.style.display = "none";

  showMoreBtn.addEventListener("click", showMore);
  showLessBtn.addEventListener("click", showLess);
  goToTopBtn.addEventListener("click", scrollToTop);
});
