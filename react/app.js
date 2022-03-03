class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      error: null,
      isLoaded: false,
      items: [],
      users: [],
    };
  }

  componentDidMount() {
    fetch("https://dream-creators.com/api?apikey=12345")
      .then((res) => res.json())
      .then(
        (result) => {
          console.log(result);
          this.setState({
            isLoaded: true,
            users: result.users,
          });
        },
        (error) => {
          this.setState({
            isLoaded: true,
            error,
          });
        }
      );
  }

  render() {
    // var ListGroup = ReactBootstrap.ListGroup;
    // var Navbar  = ReactBootstrap.Navbar;
    // var Container  = ReactBootstrap.Container;
    const { error, isLoaded, items, users } = this.state;
    if (error) {
      return <div>Error : {error.message} </div>;
    } else if (!isLoaded) {
      return <div>Loading....</div>;
    } else {
      return (
        <>
          {/* <Navbar bg="dark">
                <Container>
                    <Navbar.Brand href="#home">
                    <img
                        src="https://react-bootstrap.github.io/logo.svg"
                        width="30"
                        height="30"
                        className="d-inline-block align-top"
                        alt="React Bootstrap logo"
                    />
                    </Navbar.Brand>
                </Container>
                </Navbar> */}
          {/* <ListGroup>
                    {items.map(item => (
                        <ListGroup.Item key={item.id}>{item.name} {item.price}</ListGroup.Item>
                    ))}
                </ListGroup>
                <ListGroup>
                    {users.map(user => (
                        <ListGroup.Item key={user.id}>{user.name} {user.email} {user.phone}</ListGroup.Item>
                    ))}
                </ListGroup> */}
          <div className="wrapper">
            <ul className="box-1 radius shadow">
              {users.map((user) => (
                <li key={user.email}>
                  {user.name} {user.email}
                </li>
              ))}
            </ul>
          </div>
        </>
      );
    }
  }
}