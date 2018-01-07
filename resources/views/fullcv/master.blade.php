<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>{{$people->person_name}} | Looking For Job | {{$people->email}}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />
<link href="{{ URL::to('nebula/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('nebula/css/font-awesome.min.css') }}" rel="stylesheet"> 
    <!--link href="{{ URL::to('nebula/css/main.css') }}"  rel="stylesheet"-->
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="{{ URL::to('srt/resume.css') }}" media="all" />

</head>
<body>

<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1>{{$people->person_name}}</h1>
					<h2>{{$app->position}}</h2>
				</div>
	
				<div class="yui-u">
					<div class="contact-info">


						<h3><a id="pdf" href="javascript:window.print()">Download PDF</a></h3><br>
						<h3><br><a href="mailto:{{$people->person_email}}">{{$people->person_email}}</a><i class="fa fa-envelope" aria-hidden="true"></i></h3>
						<h3>{{$people->person_address}}</h3>
            <h3><i class="fa fa-phone" aria-hidden="true"></i>+60{{$people->person_contact}}</h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Profile</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								{{$people->objective}}
                	</p>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">

								<div class="talent">
									<h2>{{$competence->competence_area}}	</h2>
									<p>{{$competence->competence_description}}	</p>
								</div>
<?php $abc = $competence->referenceID; ?>
								<div class="talent">
									<h2></h2>
									<p></p>
								</div>

								<div class="talent">
									<h2></h2>
									<p></p>
								</div>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Strengths</h2>
						</div>
            <div class="yui-u">
							<p class="enlarge">
								{{$strength->strength_description}}
                	</p>
						</div>
						
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Current Position</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">

							<div class="job last">
								<h2>{{$app->position}}</h2>
								<h3>{{$app->association}}</h3>
								<h4>Session {{$app->session}}</h4>
								<p>As a {{$app->position}} at one of the best association found locally and known worldwide. His believed in working at {{$app->association}}, will proved that he were vitally accepted in industries. He started becoming a {{$app->position}} at {{$app->association}} on the session of {{$app->session}}.</p>
							</div>
						</div><!--// .yui-u -->
            
					</div><!--// .yui-gf -->


					<div class="yui-gf last ">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<div class="yui-u">
							<h2>{{$education->edu_institute}}</h2>
							<h3>{{$education->edu_level}} &mdash; <strong>{{$education->edu_result}}</strong> </h3>
						</div>
					</div><!--// .yui-gf -->
<div class="yui-gf last">
	
						<div class="yui-u first">
							<h2>Cocuricular Activities</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">

							<div class="job last ">
								<h2>{{$cocu->position}}</h2>
								<h3>{{$cocu->association}}</h3>
								<h4>Achievement {{$cocu->achievement}}</h4>
								<p>As a {{$cocu->position}} at one of the best association found locally and known to others colleges. His believed in involving in {{$cocu->association}}, will proved that he were vitally accepted in industries. He started becoming a {{$cocu->position}} at {{$cocu->association}} on the achievement of {{$app->achievement}}.</p>
							</div>
						</div><!--// .yui-u -->
            
					</div><!--// .yui-gf -->
	<div class="yui-gf ">
	
						<div class="yui-u first">
							<h2>References Contact</h2>
              
						</div><!--// .yui-u -->

						<div class="yui-u">
              @foreach($rujukan as $r)
              @if($r->id ==$abc)
							<div class="job last">
								<h2>{{$r->references_name}}</h2>
								<h3> </h3>
								<h4>
<i class="fa fa-phone" aria-hidden="true"></i>+60{{$r->references_contact}}</h4>
								<p>{{$r->references_detail}}</p>
							</div>
              @endif
              @endforeach
						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->
				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p>{{$people->person_name}} &mdash; <i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{$people->person_email}}"> {{$people->person_email}}</a> &mdash; <i class="fa fa-phone" aria-hidden="true"></i>+60{{$people->person_contact}}</p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->
<script type="text/javascript" src="{{ URL::to('nebula/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('nebula/js/bootstrap.min.js') }}"/></script>  
<script type="text/javascript" src="{{ URL::to('nebula/js/main.js') }}"></script>

</body>
</html>

