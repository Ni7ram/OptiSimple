			<br>
		</div>
		<div class="uk-width-1-10 azulOscuro"></div>
		</div>
	</div>

		<footer>
			<br>
			<p align="center" style="opacity: 0.8;"><i class="uk-icon-small uk-icon-eye"></i>&nbsp;<em style="color: #FFFFFF" class="noItalics" >OptiSimple <i class="uk-icon-registered"></i> - 2016</em></p>
			<p align="center" style="color: #8888dd;"><em><?php echo '&Oacute;ptica '.$this->session->nombre_optica.'&nbsp; | &nbsp;'.$this->session->direccion_optica.'&nbsp; | &nbsp;'.$this->session->telefono_optica; ?></em></p>
			<br>
		</footer>

		<script src=<?php echo site_url("assets/js/footer-reveal.min.js"); ?>></script>
		<script>
			$('document').ready(function(){
				$('footer').footerReveal();
				<?php
					if(!$this->session->home && $this->session->no_menu){
						echo "$('#menu').css(\"opacity\", \"1\");" . PHP_EOL;
						$this->session->no_menu = false;
					}
				?>
			});
		</script>
    </body>
</html>