<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Apparty</title>
	<style>
	a:hover {
		text-decoration: underline !important;
	}
	td.promocell p { 
		color:#e1d8c1;
		font-size:16px;
		line-height:26px;
		font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
		margin-top:0;
		margin-bottom:0;
		padding-top:0;
		padding-bottom:14px;
		font-weight:normal;
	}
	td.contentblock h4 {
		color:#444444 !important;
		font-size:16px;
		line-height:24px;
		font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
		margin-top:0;
		margin-bottom:10px;
		padding-top:0;
		padding-bottom:0;
		font-weight:normal;
	}
	td.contentblock h4 a {
		color:#444444;
		text-decoration:none;
	}
	td.contentblock p { 
	  	color:#888888;
		font-size:13px;
		line-height:19px;
		font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
		margin-top:0;
		margin-bottom:12px;
		padding-top:0;
		padding-bottom:0;
		font-weight:normal;
	}
	td.contentblock p a { 
	  	color:#3ca7dd;
		text-decoration:none;
	}
	@media only screen and (max-device-width: 480px) {
	     div[class="header"] {
	          font-size: 16px !important;
	     }
	     table[class="table"], td[class="cell"] {
	          width: 300px !important;
	     }
		table[class="promotable"], td[class="promocell"] {
	          width: 325px !important;
	     }
		td[class="footershow"] {
	          width: 300px !important;
	     }
		table[class="hide"], img[class="hide"], td[class="hide"] {
	          display: none !important;
	     }
	     img[class="divider"] {
		      height: 1px !important;
		 }
		 td[class="logocell"] {
			padding-top: 15px !important; 
			padding-left: 15px !important;
			width: 300px !important;
		 }
	     img[id="screenshot"] {
	          width: 325px !important;
	          height: 127px !important;
	     }
		img[class="galleryimage"] {
			  width: 53px !important;
	          height: 53px !important;
		}
		p[class="reminder"] {
			font-size: 11px !important;
		}
		h4[class="secondary"] {
			line-height: 22px !important;
			margin-bottom: 15px !important;
			font-size: 18px !important;
		}
	}
	</style>
</head>
<body bgcolor="#e4e4e4" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width:100% !important; background:#e4e4e4;-webkit-text-size-adjust:none;">
	
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e4e4e4" style="padding-bottom: 50px !important;">
	<tr>
		<td bgcolor="#e4e4e4" width="100%">
	
		<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
			<tr>
				<td width="600" class="cell">
			
			   		<table width="600" cellpadding="0" cellspacing="0" border="0" class="table">
						<tr>
							<td width="250" bgcolor="#e4e4e4" class="logocell">
								<div style="height: 100px;"></div>
							</td>
						</tr>
					</table>
								
					<layout label="New feature">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td bgcolor="#85bdad" nowrap><img border="0" src="images/spacer.gif" width="5" height="1"></td>
								<td width="100%" bgcolor="#ffffff">
							
									<table width="100%" cellpadding="20" cellspacing="0" border="0">
										<tr>
											<td bgcolor="#ffffff" class="contentblock">
											
												<h1>{{ Lang::get('confide::confide.email.password_reset.subject') }}</h1>

												<p>{{ Lang::get('confide::confide.email.password_reset.greetings', array( 'name' => $user['username'])) }},</p>

												<p>{{ Lang::get('confide::confide.email.password_reset.body') }}</p>
												<a href='{{ URL::to('users/reset_password/'.$token) }}'>
												    {{ URL::to('users/reset_password/'.$token)  }}
												</a>

												<p>{{ Lang::get('confide::confide.email.password_reset.farewell') }}</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</layout>
				</td>
			</tr>
		</table>
	</tr>
</table>  	   			     	 

</body>
</html>
