<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>List Pertemuan Kadiv</title>

		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		/>

		<!-- Bootstrap Icons -->
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
		/>
		<!-- My CSS -->
		<link rel="stylesheet" href="../projekWRI/style.css" />
		<!-- Fonts Google -->
		<link
			href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap"
			rel="stylesheet"
		/>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
			crossorigin="anonymous"
		/>
	</head>
	<body style="background-color: #f5f5f5; font-family: 'Roboto', sans-serif">
		<div class="container-fluid"></div>
		<div class="row">
			<!-- BAGIAN DASHBOARD KIRI -->
			<div class="col-3" style="background-color: #201e3d; height: 100vh">
				<div class="container-fluid p-3">
					<img src="../projekWRI/img/logoWri.png" alt="" srcset="" />
				</div>
				<div class="container-fluid">
					<ul class="nav flex-column mt-4">
						<li class="nav-item">
							<a class="nav-link text-white" aria-current="page" href="#"
								><p style="margin-bottom: 1px">Dasboard</p></a
							>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="#"
								><p style="margin-bottom: 1px">List Absensi</p></a
							>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="#"
								><p class="text-danger" style="margin-bottom: 1px">
									Log Out
								</p></a
							>
						</li>
					</ul>
				</div>
			</div>
			<!-- BAGIAN MENU KANAN -->
			<div class="col-9">
				<!-- NAVBAR -->
				<div class="container-fluid">
					<nav class="navbar navbar-expand-lg mt-3">
						<div class="container-fluid">
							<a class="navbar-brand" href="#">List Absensi Pertemuan</a>
							<button
								class="navbar-toggler"
								type="button"
								data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent"
								aria-controls="navbarSupportedContent"
								aria-expanded="false"
								aria-label="Toggle navigation"
							>
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item">
										<button
											type="button"
											class="btn btn-sm"
											style="
												font-size: 12px;
												color: #ffffff;
												background-color: #4fbeab;
											"
										>
											Tambah
										</button>
									</li>
								</ul>
								<form class="d-flex" role="search">
									<input
										class="form-control me-2"
										type="search"
										placeholder="cari"
										aria-label="Search"
										style="font-size: 14px"
									/>
									<button
										class="btn btn-primary btn-sm px-3"
										style="font-size: 13px; margin-left: 6px"
										type="submit"
									>
										Cari
									</button>
								</form>
							</div>
						</div>
					</nav>
				</div>
				<!-- END NAVBAR -->

				<!-- KONTEN LIST -->
				<div
					class="container-fluid mt-1 py-1"
					style="background-color: #ffff; border-radius: 15px; height: auto"
				>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Pertemuan</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Topik</th>
								<th scope="col text-center">Aksi</th>
							</tr>
						</thead>
						<tbody class="table-group-divider">
							<tr>
								<th scope="row">1</th>
								<td>2021-05-26</td>
								<td>UI Design</td>
								<td>
									<a class="btn btn-warning text-white" href="#">
										<i class="fa-solid fa-pen-to-square"></i>
									</a>
									<a class="btn btn-primary rounded" href="#">Detail</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- END KONTEN LIST -->

				<!-- PAGINATION -->
				<div class="d-flex justify-content-center mt-1">
					<ul class="pagination" style="font-size: 1em; font-weight: bold">
						<li class="page-item me-2">
							<a class="page-link" href="#"
								><i class="bi bi-chevron-left"></i
							></a>
						</li>
						<li class="page-item me-2"><a class="page-link" href="#">1</a></li>
						<li class="page-item me-2"><a class="page-link" href="#">2</a></li>
						<li class="page-item me-2"><a class="page-link" href="#">3</a></li>
						<li class="page-item me-2"><a class="page-link" href="#">4</a></li>
						<li class="page-item me-2"><a class="page-link" href="#">5</a></li>
						<li class="page-item me-2"><a class="page-link" href="#">6</a></li>
						<li class="page-item me-2">
							<a class="page-link" href="#"
								><i class="bi bi-chevron-right"></i
							></a>
						</li>
					</ul>
				</div>
				<!-- END PAGINATION -->
			</div>
		</div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
			crossorigin="anonymous"
		></script>
	</body>
</html>
