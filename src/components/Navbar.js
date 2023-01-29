import { Link, useMatch,useNavigate, useResolvedPath } from "react-router-dom"
import { Button } from "@mui/material"
import { account } from "../service/appwrite-config";

export default function Navbar({auth,loUsr}) {
   const navigate=useNavigate()
  const logoutUser=()=>{
    const promise = account.deleteSession('current');
    //console.log(props)
    promise.then(function (response) {
    loUsr();
    navigate("/login");
   // console.log(response); // Success
  }, function (error) {
  //  console.log(error); // Failure
  });
  };
  
  return (
    <nav className="nav">
      <Link to="/devices" className="site-title">
        Saline
      </Link>
  
      <ul>
        {/* {console.log(auth)} */}
        
        <CustomLink to="/adddevices">AddDevices</CustomLink>
        <CustomLink to="/about">About</CustomLink>
        {auth?<Button onClick={logoutUser} variant="text">LOGOUT</Button>:<CustomLink to="/login">Login</CustomLink>}

      </ul>
    </nav>
  )
}

function CustomLink({ to, children, ...props }) {
  const resolvedPath = useResolvedPath(to)
  const isActive = useMatch({ path: resolvedPath.pathname, end: true })

  return (
    <li className={isActive ? "active" : ""}>
      <Link to={to} {...props}>
        {children}
      </Link>
    </li>
  )
}