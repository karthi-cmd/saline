import {
  BrowserRouter as Router,
  Routes,
  Route,
  useNavigate,
} from "react-router-dom";
import Devices from "./pages/Devices";
// import AddDevices from "./pages/addDevices";
import NoMatch from "./pages/NoMatch";
import Variable from "./pages/Variable";
import About from "./pages/About";
import Login from "./pages/Login";
import ProtectedRoute from "./components/ProtectedRoute";
import Navbar from "./components/Navbar";
import { useState } from "react";
import { QueryClient, QueryClientProvider } from "react-query";
import Form from "./components/form";
// import TestRealtime from "./pages/TestRealtime";

function App() {
  const [auth, setAuth] = useState(false); //REMINDER: need to be false when deployed
  function loUsr() {
    //console.log(auth);
    setAuth(false);
  }
  const queryclient = new QueryClient();
  return (
    <>
      <QueryClientProvider client={queryclient}>
        <Router>
          <Navbar auth={auth} loUsr={loUsr} />
          <div className="container">
            <Routes>
              <Route element={<ProtectedRoute auth={auth} />}>
                <Route index element={<Devices />} />
                <Route path="/adddevices" element={<Form />} />
                <Route path="/devices" element={<Devices />} />
                <Route path="/variable/:id" element={<Variable />} />
                {/* <Route path="/realtime" element={<TestRealtime />} /> */}
              </Route>
              {/* <Route path="/adddevices" element={<PopUpForm/>} exact/> */}
              <Route path="/" element={<Login setAuth={setAuth} />} />
              <Route path="/login" element={<Login setAuth={setAuth} />} />
              <Route path="/about" element={<About />} />
              <Route path="*" element={<NoMatch />} />
            </Routes>
          </div>
        </Router>
      </QueryClientProvider>
    </>
  );
}

export default App;
