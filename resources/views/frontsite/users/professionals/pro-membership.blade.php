@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Membership')

@section('dashboard-content')
<style>
	[disabled] {
		opacity: 0.5;
	}

	.free-trial-btn.cancel {
		padding: 10px 5px;
	    margin-top: 30px;
	    display: block;
	    border-radius: 10px;
	    font-size: 20px;
	    font-weight: 900;
	    color: #06375c;
		background: #f00 !important;
		color: #fff !important;
		font-size: 14px !important;
		margin-top: 15px !important;
	}

	.member-table .col-inner .header h2 {
		font-size: 24px !important;
	}
</style>
<div class="pro-membership">
	<div class="content">
		<div class="dash-title clearfix">
			<h3>Choose Your Membership
				<a href="{{route('frontsite.professionals.dashboard')}}" class="f-right">Back to Dashboard</a>
			</h3>
		</div>
		<div class="membership-holder">
			<div class="bid-highlight">
				<i class="fa fa-star" aria-hidden="true"></i>
				<h3><span>$</span>7.00 </h3>
				<p>/ BID after number of BIDS have been used</p>
			</div>
			<center>
				<div class="c-hamburger c-hamburger--htx dash-nav" id="side-menus">
			        <span></span>
			    	<p>Choose Membership</p>
			    </div>
			</center>
			<div class="navigation pro">
				<ul class="slides">
					<li><a href="#membership-go-to">$1 POSTING</a></li>
					<li><a href="#membership-go-to">180-DAY FREE TRIAL PRO BASIC</a></li>
					<li><a href="#membership-go-to">Pro Basic</a></li>
					<!-- <li><a href="#membership-go-to">SILVER</a></li>
					<li><a href="#membership-go-to">GOLD</a></li> -->
				</ul>
			</div>
			<div class="member-table" id="membership-go-to">
				<ul class="header col">
					<li>
						<ul class="get-found">
							<li class="head">
								<h3>Get Found</h3>
							</li>
							<li>Number of Bids  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Maximum Exposure  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Maximum Travel Distance  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Booking Based Search Result Ranking  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Automatic Lead Generator  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Regional Leads  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>National Leads    <i class="fa fa-info-circle" aria-hidden="true"></i></li>
						</ul>

						<ul class="look-good">
							<li class="head">
								<h3>Look Good</h3>
							</li>
							<li>Customizable Profile  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Media - Audio & Video   <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Photo Gallery  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Custom Profile URL</li>
						</ul>
						<ul class="get-booked">
							<li class="head">
								<h3>Get Booked</h3>
							</li>
							<li>Email Lead Alerts <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Proactive Booking Support    <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Pay Per Booking  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Secure Payment Processing System  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
							<li>Priority Phone Support  <i class="fa fa-info-circle" aria-hidden="true"></i></li>
						</ul>
					</li>
					<!--<li class="content">
						<p>3-Months Membership
						Starting From</p>
					</li>-->
					<!--<li class="content">
						<p>Pay for 6 months & get
							1 month FREE</p>
					</li>-->
				</ul>
				<div class="member-list">
					<ul class="slides">
						<li>
							<ul class="active one-posting col col-inner">
								<li class="header">
									<div class="img-holder">
										<img src="{{asset('/frontsite/images/member1.png')}}" alt="">
									</div>
									<h3>$1 POSTING</h3>
								</li>
								<li>
									<p>Post your special deals for only
										$1 for 1 week!</p>
								</li>
								<li>
									<br><br><br><br><br><br><br><br><br><br>
									<br><br><br><br><br><br><br><br><br><br>
									<br><br><br><br><br><br><br><br><br><br>
									<br><br><br><br><br><br><br><br><br><br><br>
								</li>
								<li>
									<a href="{{route('frontsite.professionals.ads.create')}}" >SELECT <br> <span>$1 <br> POSTING</span></a>
								</li>
							</ul>
						</li>
						<li>
							<ul class="free-trial col col-inner">
								<li class="header">
									<div class="img-holder">
										<img src="{{asset('/frontsite/images/member2.png')}}" alt="">
									</div>
									<h3><span>6 Months Free Trial</span> PRO BASIC</h3>
								</li>

								<li>6</li>
								<li>7 Categories</li>
								<li>100 miles</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li><br><br><br></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>up to 3</li>
								<li>up to 25 photos</li>
								<li>&nbsp;</li>
								<li><br><br><br></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>5%</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>First 6 Bids Free
									<?php if($package == 'free' && isset($membership) && $membership->status != '3'):?>
										<a href="#" class="free-trial-btn" disabled="disabled"><span>FREE TRIAL</span>SELECTED</a>
										@if(isset($membership) && $membership->options->title == 'Free')
											<a href="{{route('frontsite.professionals.membership.cancel', ['membership_id'=>$membership->id])}}" class="free-trial-btn cancel">CANCEL MEMBERSHIP</a>
										@endif
									<?php else:?>
										@if(isset($membership) && $membership->has_availed_free == 1)
											<a href="#" class="free-trial-btn" disabled="disabled">
												<span>You already availed this package before.</span>
											</a>
										@else
											<a href="{{route('frontsite.professionals.membership.choose',['package'=>'free','duration'=>'monthly'])}}" class="free-trial-btn"><span>SELECT</span>  FREE TRIAL</a>
										@endif
									<?php endif?>
								</li>
							</ul>
						</li>
						<li>
							<ul class="bronze col col-inner">
								<li class="header">
									<div class="img-holder">
										<img src="{{asset('/frontsite/images/member3.png')}}" alt="">
									</div>
									<h2>Pro Basic</h2>
								</li>

								<li>6</li>
								<li>7 Categories</li>
								<li>100 miles</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>


								<li><br><br><br></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>up to 3</li>
								<li>up to 25 photos</li>
								<li>&nbsp;</li>
								<li><br><br><br></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>5%</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>
									<h3>$9<span>.99</span></h3>
									<p>PER MONTH</p>
									<p>$1.67/BID</p>
									<?php if($package == 'pro basic_monthly' && isset($membership) && ($membership->status != '3')): ?>
										<a href="{{route('frontsite.professionals.membership.cancel', ['membership_id'=>$membership->id])}}" class="free-trial-btn cancel">CANCEL MEMBERSHIP</a>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'bronze','duration'=>'monthly'])}}" class="mem-btn">SELECT <span>Pro Basic</span></a>
									<?php endif ?>
									<br>
								</li>
								<!-- <li>
									<h3>$55</h3>
									<p>(reg $ 60)</p>
									<p>$3.05/Bid</p>
									<?php if($package == 'pro basic_quarterly'): ?>
										<a href="{{route('frontsite.professionals.membership.cancel', ['membership_id'=>$membership->id])}}" class="free-trial-btn cancel">CANCEL MEMBERSHIP</a>
										<h2>3 MONTHS</h2>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'bronze','duration'=>'quarterly'])}}" class="mem-btn">SELECT <span>Pro Basic</span></a>
										<h2>3 MONTHS</h2>
									<?php endif ?>
								</li> -->
								<!-- <li>
									<h3>$99<span>.99</span></h3>
									<p>(reg $ 120)</p>
									<p>$2.78/Bid</p>
									<?php if($package == 'pro basic_half_year'): ?>
										<a href="{{route('frontsite.professionals.membership.cancel', ['membership_id'=>$membership->id])}}" class="free-trial-btn cancel">CANCEL MEMBERSHIP</a>
										<h2>6 MONTHS</h2>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'bronze','duration'=>'half_year'])}}" class="mem-btn">SELECT <span>Pro Basic</span></a>
										<h2>6 MONTHS</h2>
									<?php endif ?>
								</li> -->
							</ul>
						</li>
						<li>
							<ul class="active bronze col col-inner">
								<li class="header">
									<div class="img-holder">
										<img src="{{asset('/frontsite/images/member3.png')}}" alt="">
									</div>
									<h2>Pay per bid</h2>
								</li>
								<li>Bid all you want for only $7.00/bid on all events.</li>
								<li>
									<br><br><br><br><br><br><br><br><br><br>
									<br><br><br><br><br><br><br><br><br><br>
									<br><br><br><br><br><br><br><br><br><br>
									<br><br><br><br><br><br><br><br><br><br><br>
								</li>
								<li>
									<h3>$7<span>.00</span></h3>
									<p>PER BID</p>
									<?php if($package == 'pay per bid' && isset($membership) && ($membership->status != '3')): ?>
										<a href="{{route('frontsite.professionals.membership.cancel', ['membership_id'=>$membership->id])}}" class="free-trial-btn cancel">CANCEL MEMBERSHIP</a>
									<?php else:?>
										<form action="/professionals/pay-membership?package=pay_per_bid&duration=none" method="POST" class="ajaxify">
											{{csrf_field()}}
											<input type="hidden" name="package" value="pay_per_bid">
											<input type="hidden" name="duration" value="none">
											<a href="{{route('frontsite.professionals.membership.choose',['package'=>'pay_per_bid','duration'=>'none'])}}" class="mem-btn pay_per_bid">SELECT <span>Pro Basic</span></a>
										</form>
									<?php endif ?>
									<br>
								</li>
							</ul>
						</li>
						<!-- <li>
							<ul class="silver col col-inner">
								<li class="header">
									<div class="img-holder">
										<img src="{{asset('/frontsite/images/member4.png')}}" alt="">
									</div>
									<h2>SILVER</h2>
								</li>

								<li>13</li>
								<li>13 Categories</li>
								<li>200 miles</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>&nbsp;</li>


								<li><br><br><br></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>up to 6</li>
								<li>up to 40 photos</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><br><br><br></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>5%</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>
									<h3>$39<span>.99</span></h3>
									<p>PER MONTH</p>
									<p>$3.07/BID</p>
									
									<?php if($package == 'silver_monthly'): ?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'silver','duration'=>'monthly','renew'=>1])}}" class="mem-btn">RENEW <span>SILVER</span></a>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'silver','duration'=>'monthly'])}}" class="mem-btn">SELECT <span>SILVER</span></a>
									<?php endif ?>
									<br>
								</li>
								<li>
									<h3>$110</h3>
									<p>(reg $ 120)</p>
									<p>$2.82/Bid</p>
									
									<?php if($package == 'silver_quarterly'): ?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'silver','duration'=>'quarterly','renew'=>1])}}" class="mem-btn">RENEW <span>SILVER</span></a>
										<h2>3 MONTHS</h2>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'silver','duration'=>'quarterly'])}}" class="mem-btn">SELECT <span>SILVER</span></a>
										<h2>3 MONTHS</h2>
									<?php endif ?>
								</li>
								<li>
									<h3>$199</h3>
									<p>(reg $ 240)</p>
									<p>$2.55/Bid</p>
									<?php if($package == 'silver_half_year'): ?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'silver','duration'=>'half_year','renew'=>1])}}" class="mem-btn">RENEW <span>SILVER</span></a>
										<h2>6 MONTHS</h2>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'silver','duration'=>'half_year'])}}" class="mem-btn">SELECT <span>SILVER</span></a>
										<h2>6 MONTHS</h2>
									<?php endif ?>
								</li>
							</ul>
						</li>
						<li>
							<ul class="gold col col-inner">
								<li class="header">
									<div class="img-holder">
										<img src="{{asset('/frontsite/images/member5.png')}}" alt="">
									</div>
									<h2>GOLD</h2>
								</li>

								<li>20</li>
								<li>20 Categories</li>
								<li>200 miles</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>


								<li><br><br><br></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>up to 6</li>
								<li>up to 40 photos</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><br><br><br></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>5%</li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li><i class="fa fa-check" aria-hidden="true"></i></li>
								<li>
									<h3>$59<span>.99</span></h3>
									<p>PER MONTH</p>
									<p>$2.99/BID</p>
									<?php if($package == 'gold_monthly'): ?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'gold','duration'=>'monthly','renew'=>1])}}" class="mem-btn">RENEW <span>GOLD</span></a>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'gold','duration'=>'monthly'])}}" class="mem-btn">SELECT <span>GOLD</span></a>
									<?php endif ?>
									<br>
								</li>
								<li>
									<h3>$165</h3>
									<p>(reg $ 180)</p>
									<p>$2.75/Bid</p>
									<?php if($package == 'gold_quarterly'): ?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'gold','duration'=>'quarterly','renew'=>1])}}" class="mem-btn">RENEW <span>GOLD</span></a>
										<h2>3 MONTHS</h2>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'gold','duration'=>'quarterly'])}}" class="mem-btn">SELECT <span>GOLD</span></a>
										<h2>3 MONTHS</h2>
									<?php endif ?>
								</li>
								<li>
									<h3>$299<span>.95</span></h3>
									<p>(reg $ 360)</p>
									<p>$2.49/Bid</p>
									<?php if($package == 'gold_half_year'): ?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'gold','duration'=>'half_year','renew'=>1])}}" class="mem-btn">RENEW <span>GOLD</span></a>
										<h2>6 MONTHS</h2>
									<?php else:?>
										<a href="{{route('frontsite.professionals.membership.choose',['package'=>'gold','duration'=>'half_year'])}}" class="mem-btn">SELECT <span>GOLD</span></a>
										<h2>6 MONTHS</h2>
									<?php endif ?>
								</li>
							</ul>
						</li> -->
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection

@section('js_bottom')
	<script>
		$(function(){
			$('a[disabled="disabled"]').on('click', function(e){
				return false;
			});
			
			$('.cancel').on('click', function(e){
				var conf = confirm('Existing membership details will be reset such as number of remaining bids, allowed profile images and videos etc. Are you sure you still want to cancel your membership?');
				if(!conf){
					e.preventDefault();
				}
			});

			$('.pay_per_bid').on('click', function(e){
				$(this).parent('form').trigger('submit');
				return false;
			});
		});
	</script>
@endsection
