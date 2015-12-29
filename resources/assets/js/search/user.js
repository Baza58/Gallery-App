import React from 'react';

export class User extends React.Component {
	render = () => {
		return (
			<div className="links">
				<a href={this.props.url} >{this.props.name}</a>
			</div>
			)
	}
}