import React from 'react';
import { User } from './user';

export class UsersList extends React.Component {
	render = () => {
		let usersNodes = this.props.users.map((user, i) => {
			if (user.name.toLowerCase().indexOf(this.props.filterValue.toLowerCase()) !== -1) {
				return (
					<User key={i} name={user.name} url={`/uzivatel/${user.id}`} />
					)
			} 
		});
		return (
			<div>
				{usersNodes}
			</div>
			)
	}
}