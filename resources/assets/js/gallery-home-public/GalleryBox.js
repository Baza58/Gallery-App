import React from 'react';
import { GalleryList } from './GalleryList';

export class GalleryBox extends React.Component {
	
	state = {
		data: [],
		userName: ''
	}
	componentDidMount = () => {
		this.updateData();
	}
	updateData = () => {
		$.ajax({
			method: 'GET',
			url: this.props.url,
			dataType: 'json',
			success: (data) => {
				this.setState({
					data: data.data,
					userName: data.user,
				});
				
			},
			error: (xhr, status, err) => {
       			console.error(this.props.url, status, err.toString());
      		}
		});
	}
	render = () => {
		return (	
			<div>
				<h1> Galerie uživatele {this.state.userName} </h1>
				<GalleryList data={this.state.data} />
			</div>
		);
	}
	
}