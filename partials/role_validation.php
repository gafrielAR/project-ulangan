<?php

include('config.php');
include('sessions.php');

function mahasiswa() {
	global $user;

	if ($user['peran'] == 'dosen') {
		header('location: ../../?status=anda-bukan-mahasiswa');
	}
}

function dosen() {
	global $user;

	if ($user['peran'] == 'mahasiswa') {
		header('location: ../../?status=anda-bukan-dosen');
	}
}
