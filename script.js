<script>
  function performSearch() {
    const searchText = document.getElementById('search-input').value;
    const url = `search.php?search_text=${encodeURIComponent(searchText)}`;
    fetch(url)
  }
</script>