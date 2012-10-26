<?php
/**
 * Email Header
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title><?php echo get_bloginfo('name'); ?></title>
		<style type="text/css">
			/* Client-specific/Reset Styles */
			#outlook a{padding:0;} /* Force Outlook to provide a "view in browser" button. */
			body{
				width:100% !important; /* Force Hotmail to display emails at full width */
				-webkit-text-size-adjust:none; /* Prevent Webkit platforms from changing default text sizes. */
				margin:0;
				padding:0;
			}
			img{border:none; font-size:14px; font-weight:bold; height:auto; line-height:100%; outline:none; text-decoration:none; text-transform:capitalize;}
			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}
			mark { background: transparent none; color: inherit; }
			/* Template Styles */
		
			body {
				background: #eeeeee url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAYAAADgkQYQAAAAOklEQVQYGWP8//8/AyHAREgBIyOjMQPIJFwYaIAxSI6RbOvAViC7A90qmBXI4qRZh2EFunXYrEC2DgDc+VH0jS2AGAAAAABJRU5ErkJggg==);
			}
		
			#templateContainer{
				border: 1px solid #bebebe;
				-webkit-box-shadow:0 0 0 3px rgba(0,0,0,0.1);
				-webkit-border-radius:6px;
			}
		
			h1, .h1,
			h2, .h2,
			h3,
			h4, .h4 {
				color:#391601;
				display:block;
				font-family:Arial;
				font-size:34px;
				font-weight:bold;
				line-height:150%;
				margin-top:0;
				margin-right:0;
				margin-bottom:7px;
				margin-left:0;
				text-align:left;
				line-height: 1.5;
			}
		
			h2, .h2{
				font-size:25px;
				color: #732c03;
			}
		
			h3, .h3{
				font-size:20px;
				color: #e0673d;
				font-family: "Trebuchet MS";
				
			}
		
			h4, .h4{
				font-size:22px;
			}
		
			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: HEADER /\/\/\/\/\/\/\/\/\/\ */
		
			#templateHeader{
				background-color: #f23c00;
				background: -webkit-linear-gradient(#f56333, #f23c00);
				border-bottom:0;
				-webkit-border-top-left-radius:6px;
				-webkit-border-top-right-radius:6px;
			}
		
			.headerContent{
				padding:24px;
				vertical-align:middle;
			}
		
			.headerContent a:link, .headerContent a:visited{
				color:#ffffff;
				font-weight:normal;
				text-decoration:underline;
			}
		
			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: MAIN BODY /\/\/\/\/\/\/\/\/\/\ */
		
			#templateContainer, .bodyContent{
				background-color:#fdfdfd;
				-webkit-border-radius:6px;
			}
		
			.bodyContent div{
				color: #8f5635;
				font-family:Arial;
				font-size:14px;
				line-height:150%;
				text-align:left;
			}
		
			.bodyContent div a:link, .bodyContent div a:visited{
				color: #732c03;
				font-weight:normal;
				text-decoration:underline;
			}
		
			.bodyContent img{
				display:inline;
				height:auto;
			}
		
			/* /\/\/\/\/\/\/\/\/\/\ STANDARD STYLING: FOOTER /\/\/\/\/\/\/\/\/\/\ */
		
			#templateFooter{
				border-top:0;
				-webkit-border-radius:6px;
			}
		
			.footerContent div{
				color:#ab8068;
				font-family:Arial;
				font-size:12px;
				line-height:125%;
				text-align:left;
			}
		
			.footerContent div a:link, .footerContent div a:visited{
				color:#ab8068;
				font-weight:normal;
				text-decoration:underline;
			}
		
			.footerContent img{
				display:inline;
			}
		
			#credit {
				border:0;
				color:#ab8068;
				font-family:Arial;
				font-size:12px;
				line-height:125%;
				text-align:center;
			}
			
		.header{
			margin-bottom: -20px;
		}

		</style>
	</head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="background: <?php echo get_option('woocommerce_email_background_color'); ?> url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAYAAADgkQYQAAAAOklEQVQYGWP8//8/AyHAREgBIyOjMQPIJFwYaIAxSI6RbOvAViC7A90qmBXI4qRZh2EFunXYrEC2DgDc+VH0jS2AGAAAAABJRU5ErkJggg==);">
    	<center style="padding: 70px 0 0 0;">
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
            	<tr>
                	<td align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer" style="-webkit-box-shadow:0 0 0 3px rgba(0,0,0,0.025); -webkit-border-radius:6px;background-color:<?php echo get_option('woocommerce_email_body_background_color'); ?>;">
													<tr>
														<td align="center" valign="top">
															<!-- // Begin Template Header \\ -->
															<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader" style="background-color:<?php echo get_option('woocommerce_email_base_color'); ?>; -webkit-border-top-left-radius:6px; -webkit-border-top-right-radius:6px; color:<?php echo woocommerce_light_or_dark(get_option('woocommerce_email_base_color'), '#202020', '#ffffff'); ?>; font-family:Arial; font-weight:bold; line-height:100%; vertical-align:middle;">
						
																<tr>
																	<div class="header">						
																		 <img src="<?php echo get_theme_root_uri(); ?>/images/header_mail.png" alt="Tacatì Torino e Asti" />
																		 </div>
						
						
																</tr>
															</table>
															<!-- // End Template Header \\ -->
														</td>
													</tr>
                                               	<tr>
	                            <tr>
	                            	<td align="center" valign="top">
	                            		<!-- // Begin Template Body \\ -->
	                            		<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
	                            			<tr>
	                            				<td valign="top" class="bodyContent" style="background-color:<?php echo get_option('woocommerce_email_body_background_color'); ?>;">
	                            
	                            					<!-- // Begin Module: Standard Content \\ -->
	                            					<table border="0" cellpadding="20" cellspacing="0" width="100%">
	                            						<tr>
	                            							<td valign="top">
	                            								<div>