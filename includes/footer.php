</div> <!-- /.container -->

<div class="page-footer font-small blue text-center" style="margin-bottom:20px; margin-top:80px">
  <p>
    <a href="/pages/imprint.php">Imprint</a> |
    <a href="/pages/privacy.php">Privacy Policy</a>
  </p>
  <p><span class="text-muted">&copy; Christina Giannoula. All rights reserved.</span></p>
</div>

<!-- JS (load after content) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<!-- Auto-highlight the active nav link -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const current = location.pathname.split('/').pop() || 'index.php';
  document.querySelectorAll('.navbar-nav .nav-link').forEach(a => {
    const href = a.getAttribute('href');
    if (href && href === current) a.classList.add('active');
  });
});
</script>

<?php if (defined('OB_USERDIR_REWRITE')) { ob_end_flush(); } ?>

</body>
</html>
