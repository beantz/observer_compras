import { Text, View, StyleSheet, Alert, Button, Image, TextInput, TouchableOpacity} from "react-native";
import minhaImagem from "../assets/images/estrelas-da-lua.png";

export default function Index() {
  return (
    <View style={styles.container}>
      <Image source={minhaImagem} style={styles.imagem}/>
      <Text style={styles.title}>Bem vindo ao meu app.</Text>
        <Text style={styles.description}>Realize o login abaixo</Text>

        <TextInput style={styles.campo} keyboardType="email-address" maxLength="100" placeholder="Digite seu email"/>
        <TextInput style={styles.campo} keyboardType="email-address" maxLength="100" secureTextEntry={true} placeholder="Digite sua senha"/>

        <TouchableOpacity style={styles.button}>
          <Text>Logar</Text>
        </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 30,
    justifyContent: "center",
    marginBottom: 150,
    alignItems: "center"
  },
  title: {
    color: "black",
  },
  description: {
    color:'rgb(151, 138, 138)',
  },
  imagem: {
    width: 150,
    height: 150,
    padding: 10
  },
  campo: {
    width: 200,
    borderRadius: 5,
    borderColor: "black",
    borderWidth: 1,
    padding: 3,
    marginTop: 15,
  },
  button: {
    backgroundColor: 'rgb(151, 138, 138)',
    padding: 10,
    borderRadius: 5,
    width: 80,
    marginTop: 15
  }
});
