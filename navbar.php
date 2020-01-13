<nav class="navbar navbar-expand-lg nav-orange">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'home' ? 'active' : '' ?>" href="index.php">HOME</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'artikel' ? 'active' : '' ?>" href="artikel.php">ARTIKEL</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'siswa' ? 'active' : '' ?>" href="siswa.php">SISWA</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'guru' ? 'active' : '' ?>" href="guru.php">GURU</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'jurusan' ? 'active' : '' ?>" href="jurusan.php">JURUSAN</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'ekskul' ? 'active' : '' ?>" href="ekskul.php">EKSKUL</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'visi_misi' ? 'active' : '' ?>" href="visi_misi.php">VISI MISI</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'bukutamu' ? 'active' : '' ?>" href="bukutamu.php">BUKUTAMU</a>
			<a class="nav-item nav-link text-white navlink <?= $aktif == 'tentang_website' ? 'active' : '' ?>" href="tentang_website.php">TENTANG WEBSITE</a>
		</div>
	</div>
</nav>