@extends('_master')

@stop

@section('content')
	

	<form action="/usergen" method="POST">
		<table>
			<tbody>
				<tr>
					<td><label for="users">Number of Users: </label></td>
					<td><input type="number" name="users" value="{{$users}}" id="users" min="1" max="50" /> Maximum 50 users </td>
				</tr>
                <tr>
					<td><label for="profile">Profile: </label></td>
					<td>
						<input type="checkbox" name="profile" id="profile" 
							@if ($profile)
								checked
							@endif
						/>
					</td>
				</tr>
				<tr>
					<td><label for="birthday">Birthdate: </label></td>
					<td>
						<input type="checkbox" name="birthday" id="birthday" 
							@if ($birthday)
								checked
							@endif
						/>
					</td>
				</tr>
				
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Generate" /></td>
				</tr>
			</tbody>
		</table>
	</form>

	
	
			{{$content}}
		
@stop
