<?php
require_once('config.php');

/*
 * inserta el html para las imágenes
 * recibe ojbeto con srcs y alt ademas true o false para lazyload
 * si es lazy load arma un html por defecto y lo muestra tanmbien como noscript
*/
/*
ejemplo: 
<div class="lazy-load-image">
	<?php echo setHtmlImage(
		array(
			'class' => '',
			'alt' => 'Logo La Martineta',
			'src' => array(
				IMAGESURL . 'logo.png', IMAGESURL . 'logo.png', 
			),
			'svg' => '',
			'srcTablet' => '',
			'srcMobile' => ''
		), true
	);
</div>
*/
function setHtmlImage($imagenes, $lazyLoad = false) {
	$svgActive = false;
	$htmlImages = '';
	$htmlLazyLoad = '';
	$htmlImageClass = $imagenes['class']!='' ? $imagenes['class'] : 'image-responsive-block';


	if ( isset($imagenes['svg']) && $imagenes['svg'] != '' ) {
		$svgActive = true;
	}

	if ( $imagenes['src'][0] == '' && !$svgActive ) {
		//sino hay imagen por defecto o svg 
		return null;
	}


	if ( $imagenes['srcMobile'] != '' || $imagenes['srcTablet'] != '' || $svgActive) {

		//open picture html
		$htmlImages .= '<picture>';

			//svg
			if ($svgActive) {
				$htmlImages .= '<source srcset="'.$imagenes['svg'].'" type="image/svg+xml">';
			}

			//pc source first
			$htmlImages .= '<source srcset="';

			for ($b=0; $b < count($imagenes['src']); $b++) { 
				
				if ($b != 0) {
					$htmlImages .= ', ';
				}

				$htmlImages .= $imagenes['src'][$b] . ' ' . strval($b+1) . 'x';
			}

			$htmlImages .= '" media="(min-width: 992px)">';

			//tablet source 
			if ( $imagenes['srcTablet'] != '' ) {
				$htmlImages .= '<source srcset="';

				for ($a=0; $a < count($imagenes['srcTablet']); $a++) { 
					
					if ($a != 0) {
						$htmlImages .= ', ';
					}

					$htmlImages .= $imagenes['srcTablet'][$a] . ' ' . strval($a+1) . 'x';
				}
				
				$htmlImages .= '" media="(min-width: 768px)">';
			}

			//mobile source first
			if ( $imagenes['srcMobile'] != '' ) {
				$htmlImages .= '<source srcset="';

				for ($a=0; $a < count($imagenes['srcMobile']); $a++) { 
					
					if ($a != 0) {
						$htmlImages .= ', ';
					}

					$htmlImages .= $imagenes['srcMobile'][$a] . ' ' . strval($a+1) . 'x';
				}
				
				$htmlImages .= '" media="(min-width: 100px)">';
			}

			//default img in picture
			$htmlImages .= '<img class="'. $htmlImageClass .'" src="'.$imagenes['src'][0] .'" alt="'.$imagenes['alt'].'">';
		//close picture
		$htmlImages .= '</picture>';

	} else {
		//no usa picture

		$htmlImages .= '<img class="'.$htmlImageClass.'" src="'.$imagenes['src'][0] .'"';

		if ( count($imagenes['src']) > 1 ) {
			$htmlImages .= ' srcset="';

			for ($i=0; $i < count($imagenes['src']); $i++) { 
				
				if ($i != 0) {
					$htmlImages .= ', ';
				}

				$htmlImages .= $imagenes['src'][$i] . ' ' . strval($i+1) . 'x';
			}

			$htmlImages .= '"';
		}

		$htmlImages .= ' alt="'.$imagenes['alt'].'">';
	}

	//si tiene lazyload se arma un src vacio y con data para js
	if ( $lazyLoad ) {
		
		$htmlLazyLoad .= '<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="';
		$htmlLazyLoad .= ' alt="'.$imagenes['alt'].'"';
		$htmlLazyLoad .= ' class="'.$htmlImageClass.'"';


		//data srcset
		$htmlLazyLoad .= ' data-src="'; 
		for ($c=0; $c < count($imagenes['src']); $c++) { 
			
			$htmlLazyLoad .= $imagenes['src'][$c] . ',';
		}
		
		$htmlLazyLoad .= '"';

		//svg
		if ($svgActive) {
			$htmlLazyLoad .= ' data-src-svg="'.$imagenes['svg'].'"';
		}

		//data srcset
		if ( $imagenes['srcTablet'] != '' ) {
			$htmlLazyLoad .= ' data-src-tablet="'; 
			for ($c=0; $c < count($imagenes['srcTablet']); $c++) { 
				
				$htmlLazyLoad .= $imagenes['srcTablet'][$c] . ',';
			}

			$htmlLazyLoad .= '"';
		} else {
			$htmlLazyLoad .= ' data-src-tablet=""'; 
		}

		//data srcset
		if ( $imagenes['srcMobile'] != '' ) {
			$htmlLazyLoad .= ' data-src-mobile="'; 
			for ($c=0; $c < count($imagenes['srcMobile']); $c++) { 
				
				$htmlLazyLoad .= $imagenes['srcMobile'][$c] . ',';
			}

			$htmlLazyLoad .= '"';
		} else {
			$htmlLazyLoad .= ' data-src-mobile=""'; 
		}


		$htmlLazyLoad .= ' >';
		
		//con lazyload retorna el html para cargar en lazyload y el por defecto el html psino usa js
		$htmlLazyLoad .= '<noscript>';
			$htmlLazyLoad .= '<img class="'.$htmlImageClass.'" src="'.$imagenes['src'][0] .'" alt="'.$imagenes['alt'].'">';
		$htmlLazyLoad .= '</noscript>';

		return $htmlLazyLoad;
	
	} else {
		//sin lazy load retorna unicamente html de imagenes
		return $htmlImages;
	}
	
}