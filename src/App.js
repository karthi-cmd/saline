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

import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Devices from "./pages/Devices";
import About from "./pages/About";
import Login from "./pages/Login";
import  ProtectedRoute from "./components/ProtectedRoute";
import Navbar from './components/Navbar'
function App() {
  return (
    <>
      
      <Router>
      <Navbar />
      <div className="container">
        <Routes>
          <Route element={<ProtectedRoute />}>
          <Route path="/devices" element={<Devices/>} exact/>
          {/* <Route path="/variable" element={<Variable/>} />*/}
          </Route>
          <Route path="/login" element={<Login/>} />
          <Route path="/about" element={<About />} /> 
        </Routes>
        </div>
        </Router>
     
    </>
  );
}

export default App;

