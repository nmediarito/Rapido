import React from 'react';
import ReactDOM from 'react-dom';

class MembershipList extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
          users: []
        };
    }

    componentDidMount() {
        fetch('https://gorest.co.in/public/v2/users')
            .then(response => response.json())
            .then(data => this.setState({ users: data }));
    }

    render() {
    return (
    <div className="row justify-content-center text-center card">
        <table className="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                {this.state.users.map(user => (
                <tr key={user.id}>
                    <td key={user.id}>{user.id}</td>
                    <td key={user.name}>{user.name}</td>
                    <td key={user.email}>{user.email}</td>
                </tr>
                ))}
            </tbody>
        </table>
    </div>
    );
    }
}

export default MembershipList;

if (document.getElementById('membershiplist')) {
    ReactDOM.render(<MembershipList />, document.getElementById('membershiplist'));
}
