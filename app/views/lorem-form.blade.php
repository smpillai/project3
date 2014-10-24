@extends('_master')

@stop

@section('content')
	

	<form action="loremgen" method="POST">
		<table>
			<tbody>
				<tr>
					<td><label for="paragraphs">Choose the number of paragraphs: </label></td>
					<td><input type="number" name="paragraphs" value="{{$paragraphs}}" id="paragraphs" min="1" max="50" /> Maximum 50 paragraphs</td>
				</tr>
				
					<td><input type="submit" name="Generate" value="Generate" /></td>
				
			</tbody>
		</table>
	</form>

	
	
	{{$content}}
		
@stop
