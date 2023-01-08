import React from "react";
import { Route, redirect } from "react-router-dom";

function ProtectedRoute({ isAuth: isAuth, component: Component, ...rest }) {
  return (
    <Route
      {...rest}
      render={(props) => {
        if (isAuth) {
          return <Component />;
        } else {
          return redirect("/login");
        }
      }}
    />
  );
}

export default ProtectedRoute;
