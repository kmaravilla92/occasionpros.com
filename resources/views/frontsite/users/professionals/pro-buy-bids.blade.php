@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Buy Bids')

@section('dashboard-content')

	<div class="content client-acct-info">
		<div class="dash-title">
			<h3>Buy Bids</h3>
		</div>

		<div class="form-holder">
			{!!
				Form::open([
					'method' => 'GET',
					'url' => $form['url']
				])
			!!}
				<ul>
					<li class="clearfix">
						<div class="full-width">
							<label for="bids_count">Bids Count</label>
							<input type="number" name="bids_count" id="bids_count" value="1" min="1" required>
							<br>
							<h3>To Pay: $ <em id="to_pay">7.00</em></h3>
						</div>
					</li>
				</ul>
				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" data-orig-text="NEXT" value="NEXT">
				</div>
			{!!
				Form::close()
			!!}
		</div>
	</div>
@endsection

@section('js_bottom')
	<script>
		$(function(){
			var $bids_count = $('#bids_count');
			var $to_pay = $('#to_pay');
			var bids_count = 0;
			var to_pay = +{{config('occ_pros.settings.payment.bid_fee')}};
				$bids_count.on('change', function(){
					var $this = $(this);

					bids_count = +($this.val());
					to_pay *= bids_count;
					console.log($this.parents('form').find('[type="submit"]'),to_pay);
					$this.parents('form').find('[type="submit"]').prop('disabled',to_pay == 0);

					$to_pay.html(to_pay.toFixed(2));
				});
		});
	</script>
@endsection
