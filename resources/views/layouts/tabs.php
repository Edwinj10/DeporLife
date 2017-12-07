<!DOCTYPE html>
<title>My Example</title>

<!-- Bootstrap 4 alpha CSS -->


<style>
body {
padding-top: 1em;
} 
</style>

<div class="container-fluid">
    
<ul class="nav nav-tabs">
  
<li class="nav-item">
<a class="nav-link active" href="#">HTML</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">CSS</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">JavaScript</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Preview</a>
</li>

</ul>

</div>
    
<!-- jQuery library -->


<!-- Initialize Bootstrap functionality -->
<script>
// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>