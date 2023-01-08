import "./App.css";
import {
  createBrowserRouter,
  createRoutesFromElements,
  Outlet,
  Route,
  RouterProvider,
} from "react-router-dom";
import Devices from "./pages/Devices";
import Home from "./pages/Home";
import Variables from "./pages/Variables";
import Login from "./pages/Login";
import NoMatch from "./pages/NoMatch";
import { Topbar } from "./components/Topbar";
import { UserContextProvider } from "./contexts/ContextProvider";

function App() {
  const router = createBrowserRouter(
    createRoutesFromElements(
      <Route path="/" element={<Root />}>
        <Route index element={<Home />} />
        <Route path="mydevices" element={<Devices />} />
        <Route path="variables" element={<Variables />} />
        <Route path="login" element={<Login />} />
        <Route path="*" element={<NoMatch />} />
      </Route>
    )
  );

  return (
    <UserContextProvider>
      <div className="App">
        <RouterProvider router={router} />
      </div>
    </UserContextProvider>
  );
}

const Root = () => {
  return (
    <>
      <Topbar />
      <div>
        <Outlet />
      </div>
    </>
  );
};

export default App;
