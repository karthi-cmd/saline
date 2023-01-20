// import "./App.css";
// import {
//   createBrowserRouter,
//   createRoutesFromElements,
//   Outlet,
//   Route,
//   RouterProvider,
// } from "react-router-dom";
// import Devices from "./pages/Devices";
// import Home from "./pages/Home";
// import Variables from "./pages/Variables";
// import Login from "./pages/Login";
// import NoMatch from "./pages/NoMatch";
// import { Topbar } from "./components/Topbar";
// import { UserContextProvider } from "./contexts/ContextProvider";

// function App() {
//   const router = createBrowserRouter(
//     createRoutesFromElements(
//       <Route path="/" element={<Root />}>
//         <Route index element={<Home />} />
//         <Route path="mydevices" element={<Devices />} />
//         <Route path="variables" element={<Variables />} />
//         <Route path="login" element={<Login />} />
//         <Route path="*" element={<NoMatch />} />
//       </Route>
//     )
//   );

//   return (
//     <UserContextProvider>
//       <div className="App">
//         <RouterProvider router={router} />
//       </div>
//     </UserContextProvider>
//   );
// }

// const Root = () => {
//   return (
//     <>
//       <Topbar />
//       <div>
//         <Outlet />
//       </div>
//     </>
//   );
// };

// export default App;

import { BrowserRouter as Router, Routes, Route ,useNavigate} from "react-router-dom";
import CustomizedDialogs from "./components/dialogue"
import CustomizedVarDialogs from "./components/vardialogue"
import AddDevices from "./pages/AddDevices";
import Variables from "./pages/Variables";
import About from "./pages/About";
import Login from "./pages/Login";
import  ProtectedRoute from "./components/ProtectedRoute";
import Navbar from './components/Navbar'
import { useState } from "react";

function App() {
 const [auth,setAuth]=useState(false)//REMINDER: need to be false when deployed
 function loUsr(){  
    console.log(auth);
      setAuth(false);   
  };
 return (
    <>
      
      <Router>
      <Navbar auth={auth} loUsr={loUsr}/>
      <div className="container">
        <Routes>
          <Route element={<ProtectedRoute auth={auth}  />}>
          <Route path="/devices" element={<CustomizedDialogs><AddDevices/></CustomizedDialogs>} exact/>
          {<Route path="/variable" element={<CustomizedVarDialogs><Variables/></CustomizedVarDialogs>} />}
          </Route>
          <Route path="/login" element={<Login setAuth={setAuth}/>} />
          <Route path="/about" element={<About />} /> 
        </Routes>
        </div>
        </Router>
     
    </>
  );
}

export default App;

