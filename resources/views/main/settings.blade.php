@extends('layouts.template_main')
@section('title', 'Settings')
@section('content')
<div class="container">
	<h2 style="margin-top: 69px;">Settings</h2>
	<ul class="nav justify-content-center navbar-bawah">
		<li class="nav-item">
			<a class="nav-link text-secondary active" href="#" style="margin-right: 9px; margin-left: 9px;" onclick="showPosts('editprofile')">Edit Profile</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-secondary" href="#" style="margin-right: 9px; margin-left: 9px;" onclick="showPosts('account')">Account</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-secondary" href="#" style="margin-right: 9px; margin-left: 9px;" onclick="showPosts('notification')">Notification</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-secondary" href="#" style="margin-right: 9px; margin-left: 9px;" onclick="showPosts('privacy')">Privacy & Security</a>
		</li>
	</ul>
</div>
<main class="container-fluid border" style="margin-top: 4px;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4 border-start border-end" style="max-height: 500px; overflow-y: auto;">
				<div class="profile-container">
					<div class="profile-header bg-light">
						<div class="d-flex justify-content-center align-items-center pt-5" style="height: 450px; position: relative;">
							<div style="position: relative; text-align: center; z-index: 1;">
								<h2>Profile</h2>
								<div style="position: relative; display: inline-block;">
									<img id="profileImage" src="{{ $avatar }}" alt="Profile Image" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
									<button id="changeImageButton" class="ui icon button circular pencil btn-light" style="position: absolute; bottom: 0; right: 0; border: 1px solid black;">
										<i class="pencil icon"></i>
									</button>
									<input type="file" id="imageInput" accept="image/*" style="display: none;">
								</div>


								<div style="text-align: center; margin-top: 20px;">
									<!-- Adjusted margin-top to push the content below the centered profile picture -->
									<h2 class="mt-3 mb-2">{{$name}}</h2>
									<span class="mt-3 mb-2">{{ '@'.$username }}</span>
									<p class="fs-6 mt-2 mb-2">
										<span style="color: {{ $interest == 'Business' ? 'orange' : '#9747FF' }}; margin-right: 8px;">• {{$interest}}</span>
									</p>
									<div class="user-stats">
										<div class="d-flex justify-content-center fs-6" style="margin-top: 30px;">
											<div style="padding: 0 8px; border-right: 2px solid black;">
												<div class="mb-2">4</div>
												<div style="color: #13005A;">Posts</div>
											</div>
											<div style="padding: 0 8px; border-right: 2px solid black;">
												<div class="mb-2">270</div>
												<div style="color: #13005A;">Followers</div>
											</div>
											<div style="padding: 0 8px; border-right: 2px solid black;">
												<div class="mb-2">40</div>
												<div style="color: #13005A;">Following</div>
											</div>
											<div style="padding: 0 8px;">
												<div class="mb-2">3</div>
												<div style="color: #13005A;">Communities</div>
											</div>
										</div>
									</div>
									<p class="fs-6 mt-3 mb-2">{{ $bio }}</p>
								</div>
							</div>
						</div>
						<hr class="mt-1" style="border-top: 4px solid #E5E5E5;">
					</div>
				</div>
			</div>
			<div class="col-md-7 border-start border-end">
				<div class="edit-profile" style="margin-bottom: 40px;" data-category="editprofile">
					<h2 style="margin-top: 40px; margin-left: 40px;">Edit Profile</h2>
					<hr class="mt-1" style="border-top: 4px solid #E5E5E5; width: 80%; margin-left: 40px;">
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 25px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Name</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#nameModal">
							<span id="userName">{{ $name }}</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<!-- Modal untuk mengedit nama -->
						<div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="nameModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="nameModalLabel">Edit Name</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h5 class="text-secondary">Name</h5>
										<form method="POST" action="{{ route('updateProfile') }}">
											@csrf
											<input type="text" class="form-control" id="nameInput" value="{{ $name }}" name="name">
											<p style="margin-top: 5px;">Your name can only be changed once every 1 month.</p>
										</div>
										<div class="modal-footer d-flex justify-content-center">
											<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-secondary" onclick="saveName()">Save changes</button>
										</div>
										</form>
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Username</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#usernameModal">
							<span id="usernameSpan">{{ '@'.$username }}</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<div class="modal fade" id="usernameModal" tabindex="-1" aria-labelledby="usernameModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="usernameModalLabel">Change Username</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h5 class="text-secondary">New Username</h5>
										<form method="POST" action="{{ route('updateProfile') }}">
											@csrf
											<input type="text" class="form-control" id="newUsernameInput" value="{{ $username }}" name="username">
											<p style="margin-top: 5px;">www.thrivian.org/@your_username</p>
											<p style="margin-top: 5px;">Usernames can containt only letters, numbers, underscores, and periods. Changing your username will also change your profile link.</p>
										</div>
										<div class="modal-footer d-flex justify-content-center">
											<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-secondary" onclick="saveUsername()">Save changes</button>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Interest</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#interestModal">
							<span id="selectedInterest">{{ $interest }}</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<!-- Modal untuk memilih Interest -->
						<div class="modal fade" id="interestModal" tabindex="-1" aria-labelledby="interestModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="interestModalLabel">Select Interest</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h5 class="text-secondary">Interest to</h5>
										<form method="POST" action="{{ route('updateProfile') }}">
										@csrf
										<select class="form-select" id="interestSelect" name="interest">
											<option value="Business">business</option>
											<option value="Finance">Finance</option>
											<option value="Self Development">Self Development</option>
										</select>
									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-secondary" onclick="saveInterest()">Save changes</button>
									</div>
										</form>
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Bio</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#bioModal">
							<span id="userBio">{{ implode(' ', array_slice(explode(' ', $bio), 0, 5)) }}...</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<!-- Modal untuk bio -->
						<div class="modal fade" id="bioModal" tabindex="-1" aria-labelledby="bioModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="bioModalLabel">Change Bio</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h5 class="text-secondary">Bio</h5>
										<form method="POST" action="{{ route('updateProfile') }}">
										@csrf
										<textarea class="form-control" id="bioTextarea" rows="3" name="bio">{{ $bio }}</textarea>
									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-secondary" onclick="saveBio()">Save changes</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Gender</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#genderModal">
							<span id="selectedGender">{{ $gender }}</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<!-- Modal untuk memilih gender -->
						<div class="modal fade" id="genderModal" tabindex="-1" aria-labelledby="genderModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="genderModalLabel">Select Gender</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h5 class="text-secondary">Gender</h5>
										<form method="POST" action="{{ route('updateProfile') }}">
										@csrf
										<select class="form-select" id="genderSelect" name="gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
										</select>
									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-secondary" onclick="saveGender()">Save changes</button>
									</div>
										</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="edit-profile" style="margin-bottom: 40px; display: none;" data-category="account">
					<h2 style="margin-top: 40px; margin-left: 40px;">Edit Account</h2>
					<hr class="mt-1" style="border-top: 4px solid #E5E5E5; width: 80%; margin-left: 40px;">
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 25px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Email</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#emailModal">
							<span id="userEmail">{{ $email }}</span>
							</button>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Password</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#passwordModal">
							<span id="userPassword">********</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<form method="POST" action="{{ route('password.update') }}">
										@csrf
										<div class="modal-header">
											<h4 class="modal-title" id="passwordModalLabel">Change Password</h4>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<h5 class="text-secondary">Current Password</h5>
											<input type="password" name="current_password" class="form-control" required>
											<h5 class="text-secondary">New Password</h5>
											<input type="password" name="new_password" class="form-control" required>
											<h5 class="text-secondary">Confirm New Password</h5>
											<input type="password" name="new_password_confirmation" class="form-control" required>
										</div>
										<div class="modal-footer d-flex justify-content-center">
											<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-secondary">Save changes</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Phone Number</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#phoneModal">
							<span id="userPhone">{{ $phone_number }}</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<div class="modal fade" id="phoneModal" tabindex="-1" aria-labelledby="phoneModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="phoneModalLabel">Change Phone Number</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h5 class="text-secondary">New Phone Number</h5>
										<form method="POST" action="{{ route('updateProfile') }}">
										@csrf
										<input type="text" class="form-control" id="newPhoneInput" name="phone_number" value="{{ $phone_number }}">
									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-secondary" onclick="savePhoneNumber()">Save changes</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Date of Birth</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#dobModal">
							<span id="userDob">{{ (new DateTime($date_of_birth))->format('F j, Y') }}</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<div class="modal fade" id="dobModal" tabindex="-1" aria-labelledby="dobModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="dobModalLabel">Change Date of Birth</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h5 class="text-secondary">New Date of Birth</h5>
										<form method="POST" action="{{ route('updateProfile') }}">
										@csrf
										<input type="date" class="form-control" id="newDobInput" name="date_of_birth" value="{{ $date_of_birth }}">
									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-secondary" onclick="saveDateOfBirth()">Save changes</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Location</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-link text-dark" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#locationModal">
							<span id="userLocation">{{ $location }}</span>
							<i class="angle right icon" style="margin-left: 10px;"></i>
							</button>
						</div>
						<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="locationModalLabel">Change Location</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
									<form method="POST" action="{{ route('updateProfile') }}">
										@csrf
										<h5 class="text-secondary">New Location</h5>
										<input type="text" class="form-control" id="newLocationInput" name="location" value="{{$location}}">
									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="button" class="btn btn-light me-2 border-dark" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-secondary" onclick="saveLocation()">Save changes</button>
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-center" style="margin-top: 20px;">
						<button type="button" class="btn btn-danger" style="border-radius: 10px;">Delete Account</button>
					</div>
				</div>
				<div class="edit-profile" style="margin-bottom: 40px; display: none;" data-category="notification">
					<h2 style="margin-top: 40px; margin-left: 40px;">Notification</h2>
					<hr class="mt-1" style="border-top: 4px solid #E5E5E5; width: 80%; margin-left: 40px;">
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 25px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Discount Notification</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 90px;">
							<div class="form-check form-switch d-flex justify-content-end">
								<input class="form-check-input" type="checkbox" id="discountSwitch" onchange="toggleDiscount()">
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">New Course Notification</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 90px;">
							<div class="form-check form-switch d-flex justify-content-end">
								<input class="form-check-input" type="checkbox" id="discountSwitch" onchange="toggleDiscount()">
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Reminder Notification</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 90px;">
							<div class="form-check form-switch d-flex justify-content-end">
								<input class="form-check-input" type="checkbox" id="discountSwitch" onchange="toggleDiscount()">
							</div>
						</div>
					</div>
				</div>
				<div class="edit-profile" style="margin-bottom: 40px; display: none;" data-category="privacy">
					<h2 style="margin-top: 40px; margin-left: 40px;">Privacy & Settings</h2>
					<hr class="mt-1" style="border-top: 4px solid #E5E5E5; width: 80%; margin-left: 40px;">
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 25px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Verifiy your Email</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 70px;">
							<button type="button" class="btn btn-light text-dark" style="text-decoration: none;" onclick="verifyEmail()" data-bs-toggle="popover" data-bs-content="Success Verification." data-bs-placement="top">
							<i class="check circle outline icon green" id="verifyIcon" style="margin-left: 10px;"></i>
							</button>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Allow public seen my profile</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 90px;">
							<div class="form-check form-switch d-flex justify-content-end">
								<input class="form-check-input" type="checkbox" id="discountSwitch" onchange="toggleDiscount()">
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Two Step Verification</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 90px;">
							<div class="form-check form-switch d-flex justify-content-end">
								<input class="form-check-input" type="checkbox" id="discountSwitch" onchange="toggleDiscount()">
							</div>
						</div>
					</div>
					<div style="display: flex; align-items: center; margin-left: 40px; margin-top: 15px;">
						<div style="flex: 1;">
							<span style="font-weight: bold;">Allow Public Invite to Community</span>
						</div>
						<div style="flex: 1; text-align: right; margin-right: 90px;">
							<div class="form-check form-switch d-flex justify-content-end">
								<input class="form-check-input" type="checkbox" id="discountSwitch" onchange="toggleDiscount()">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</main>

<script>
	// Fungsi untuk menghapus kelas active dari semua elemen nav-link
	function removeActiveClass() {
	        var navLinks = document.querySelectorAll('.nav-link');
	        navLinks.forEach(function(link) {
	            link.classList.remove('active');
	        });
	    }
	
	    // Fungsi untuk menambahkan kelas active ke teks yang diklik
	    function setActiveLink(link) {
	        removeActiveClass(); // Hapus kelas active dari semua elemen nav-link
	        link.classList.add('active'); // Tambahkan kelas active ke teks yang diklik
	    }
	
	    // Ambil semua elemen anchor dengan kelas nav-link
	    var navLinks = document.querySelectorAll('.nav-link');
	
	    // Tambahkan event listener ke setiap elemen anchor
	    navLinks.forEach(function(link) {
	        link.addEventListener('click', function() {
	            setActiveLink(link); // Ketika teks navigasi diklik, atur teks yang diklik sebagai aktif
	        });
	    });
	
	   function showPosts(category) {
	    var profiles = document.getElementsByClassName('edit-profile');
	    for (var i = 0; i < profiles.length; i++) {
	        var profile = profiles[i];
	        var profileCategory = profile.getAttribute('data-category');
	        if (category === 'All' || profileCategory === category) {
	            profile.style.display = 'block';
	        } else {
	            profile.style.display = 'none';
	        }
	    }
	}

    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen input file dan tombol untuk mengubah gambar
        const imageInput = document.getElementById('imageInput');
        const changeImageButton = document.getElementById('changeImageButton');
        const profileImage = document.getElementById('profileImage');

        // Tambahkan event listener untuk mengubah gambar saat input file berubah
        imageInput.addEventListener('change', function () {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(file);

                // Kirim file ke server melalui AJAX
                const formData = new FormData();
                formData.append('image', file);

                fetch('{{ route('updateProfile') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Image uploaded successfully');
                    } else {
                        console.error('Image upload failed');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });

        // Tambahkan event listener untuk memicu klik pada input file saat ikon pensil diklik
        changeImageButton.addEventListener('click', function () {
            imageInput.click();
        });
    });



	function saveGender() {
	        var selectedGender = document.getElementById('genderSelect').value;
	        document.getElementById('selectedGender').textContent = selectedGender;
	        
	        // Menutup modal
	        var myModal = new bootstrap.Modal(document.getElementById('genderModal'));
	        myModal.hide();
	    }
	
	function saveBio() {
	    var bioText = document.getElementById('bioTextarea').value;
	    document.getElementById('userBio').textContent = bioText;
	    
	    // Menutup modal
	    var bioModal = new bootstrap.Modal(document.getElementById('bioModal'));
	    bioModal.hide();
	}
	
	function saveInterest() {
	    var selectedInterest = document.getElementById('interestSelect').value;
	    document.getElementById('selectedInterest').textContent = selectedInterest;
	    
	    // Menutup modal
	    var interestModal = new bootstrap.Modal(document.getElementById('interestModal'));
	    interestModal.hide();
	}
	
	function saveName() {
	    var newName = document.getElementById('nameInput').value;
	
	    document.getElementById('userName').textContent = newName;
	
	    var nameModal = new bootstrap.Modal(document.getElementById('nameModal'));
	    nameModal.hide();
	}
	
	function saveUsername() {
	    // Dapatkan nilai dari input username baru
	    var newUsername = document.getElementById('newUsernameInput').value;
	
	    // Simpan username baru ke dalam elemen span yang menampilkan username
	    document.getElementById('usernameSpan').textContent = newUsername;
	
	    // Tutup modal setelah menyimpan perubahan
	    var usernameModal = new bootstrap.Modal(document.getElementById('usernameModal'));
	    usernameModal.hide();
	}
	
	function saveEmail() {
	            var newEmail = document.getElementById('newEmailInput').value;
	            document.getElementById('userEmail').textContent = newEmail;
	            // Tambahkan logika penyimpanan data disini
	        }
	
	        function savePassword() {
	            var newPassword = document.getElementById('newPasswordInput').value;
	            document.getElementById('userPassword').textContent = '******'; // Tampilkan password dengan asterisk
	            // Tambahkan logika penyimpanan data disini
	        }
	
	        function savePhoneNumber() {
	            var newPhoneNumber = document.getElementById('newPhoneInput').value;
	            document.getElementById('userPhone').textContent = newPhoneNumber;
	            // Tambahkan logika penyimpanan data disini
	        }
	
	        function saveDateOfBirth() {
	            var newDateOfBirth = document.getElementById('newDobInput').value;
	            document.getElementById('userDob').textContent = newDateOfBirth;
	            // Tambahkan logika penyimpanan data disini
	        }
	
	        function saveLocation() {
	            var newLocation = document.getElementById('newLocationInput').value;
	            document.getElementById('userLocation').textContent = newLocation;
	            // Tambahkan logika penyimpanan data disini
	        }
	
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
	  return new bootstrap.Popover(popoverTriggerEl)
	})
	
</script>>
@endsection
