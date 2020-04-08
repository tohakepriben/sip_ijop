<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'form_validation', 'session');
$autoload['drivers'] = array();
$autoload['helper'] = array(
						'url',
						'form',
						'text', 
						'fungsi_helper', 
						'file'
					);
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array(
						'm_user',
						'm_pengajuan',
						'm_alamat',
						'm_berkas'
						);
