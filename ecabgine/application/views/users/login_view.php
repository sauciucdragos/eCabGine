<div class="container mt150">
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">

			<?php $attributes = array('id' => 'login_form', 'class'=> 'form_horisontal')  ?>

			<?php echo form_open('users/login', $attributes); ?>

			<div class="form-group">
				<?php echo form_label('Username'); ?>
				<?php	$data = array(
					'class' => 'form-control',
					'name' => 'username',
					'placeholder' => 'Enter username'
					);
				?>
					<?php echo form_input($data); ?>
			</div>

			<div class="form-group">
				<?php echo form_label('password');  ?>
				<?php  $data = array(
					'class' => 'form-control',
					'name' => 'password',
					'placeholder' => 'Enter password'
					);
				?>
				<?php echo form_password($data); ?>
			</div>
			<div class="row mt70">
				<div class="col-lg-6 d-flex justify-content-around">
					<div class="form-group">
						<?php $data = array(
							'class' => 'btn btn-primary btn-lg',
							'name' => 'submit',
							'value' => 'Login'
							);
						?>
						<?php echo form_submit($data); ?>
					</div>
				</div>
				<div class="col-lg-6 d-flex justify-content-around">
					<div class="form-group">
						<?php $data = array(
							'class' => 'btn btn-primary btn-lg',
							'name' => 'signup',
							'value' => 'Signup'
							);
						?>
						<?php echo form_submit($data); ?>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>

		</div>
		<div class="col-lg-3"></div>
	</div>
</div>
