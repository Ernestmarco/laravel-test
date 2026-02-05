<?php
function fechaActual($format)
{
    return date($format);
}

function setActivo($nombreRuta)
{
	return request()->routeIs($nombreRuta) ? 'active' : '';
}