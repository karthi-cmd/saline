import Card from "@mui/material/Card";
import CardContent from "@mui/material/CardContent";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";



const VariableCard = ({ name, value }) => {

  return (
    <>
      <Grid sx={{ p: "2%" }}>
        <Card
          sx={{
            width: 225,
            height: "100%",
            backgroundImage: "linear-gradient(to right,#EC008C,#FC6767)",
            borderRadius: "10px",
          }}
          variant="outlined"
          
        >

          <>
            <CardContent>
              
                <Grid container justifyContent="flex-start">
                  <Typography variant="h4" color="#FFFFFF" sx={{ pb: 2 }}>
                    {name}
                  </Typography>

                </Grid>
             

              <Grid container justifyContent="flex-start">
                  <Typography variant="h5" color="#FFFFFF" align="left">
                    {value}
                  </Typography>
                
              </Grid>
            </CardContent>
          </>
        </Card>
      </Grid>
    </>
  );
};

export default VariableCard;
