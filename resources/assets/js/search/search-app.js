import React from 'react';
import { SearchForm } from './search-form';
import { UsersList } from './users-list';
 
export class SearchApp extends React.Component {
	state = {
		data: [],
		filteredText: ''
	}

	componentDidMount = () => {
		$.ajax({
			method: 'GET',
			url: this.props.url,
			success: (data) => {
				this.setState({
					data: data.data 
				});
			}
		})
	}
	
	handleSearch = (filteredText) => {
		this.setState({
			filteredText
		});
	}
	render = () => {
		return (
			<div>
				<h1>Uživatelé</h1>
				<SearchForm onTextChange={this.handleSearch} filteredText={this.state.filteredText} />
				<UsersList users={this.state.data} filterValue={this.state.filteredText} />
			</div>
			)
	}
}
