
import { BrowserRouter as Router, Routes, Route ,useNavigate} from "react-router-dom";
import CustomizedVarDialogs from "./components/vardialogue"
import Devices from "./pages/devices";
//import PopUpForm from "./pages/addDevices"
import Variables from "./pages/Variables";
import About from "./pages/About";
import Login from "./pages/Login";
import  ProtectedRoute from "./components/ProtectedRoute";
import Navbar from './components/Navbar'
import { useState } from "react";

function App() {
 const [auth,setAuth]=useState(false)//REMINDER: need to be false when deployed
 function loUsr(){  
    //console.log(auth);
      setAuth(false);   
  };
 return (
    <>
      
      <Router>
      <Navbar auth={auth} loUsr={loUsr}/>
      <div className="container">
        <Routes>
          <Route element={<ProtectedRoute auth={auth}  />}>
          <Route path="/devices" element={<Devices/>} exact/>
         
          {<Route path="/variable" element={<CustomizedVarDialogs><Variables/></CustomizedVarDialogs>} />}
          </Route>
          {/* <Route path="/adddevices" element={<PopUpForm/>} exact/> */}
          <Route path="/login" element={<Login setAuth={setAuth}/>} />
          <Route path="/about" element={<About />} /> 
        </Routes>
        </div>
        </Router>
     
    </>
  );
}

export default App;

