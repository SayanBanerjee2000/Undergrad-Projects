using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{
    public Text lives;
    public Text score;
    public Text result;

    public static int enemiesKilled;

    // Start is called before the first frame update
    void Start()
    {
        enemiesKilled = 0;
        lives.text = "LIVES: 3";
        score.text = "SCORE: 0";
        result.text = "";
    }

    // Update is called once per frame
    void Update()
    {
        lives.text = "LIVES: " + Player.lives.ToString();
        score.text = "SCORE: " + (enemiesKilled * 10).ToString();

        if (Player.lives == 0)
            result.text = "GAME OVER";
        else if (enemiesKilled == 28)
            result.text = "YOU WON!";

        //Restart, Exit
        if (Input.GetKeyDown(KeyCode.R))
            SceneManager.LoadScene(0);
        else if (Input.GetKeyDown(KeyCode.E))
            Application.Quit();

    }
}
