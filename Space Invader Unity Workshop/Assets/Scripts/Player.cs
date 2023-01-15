using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Player : MonoBehaviour
{
    public float speed = 10f;

    public Transform spawn;

    public GameObject bullet;

    public int lives;
    // Start is called before the first frame update
    void Start()
    {
        lives = 3;
    }

    // Update is called once per frame
    void Update()
    {
        //Player movement
        float move = Input.GetAxis("Horizontal");
        transform.position += new Vector3(move * speed * Time.deltaTime, 0f, 0f);

        //Movement clamp
        float clampX = Mathf.Clamp(transform.position.x, -10f, 10f);
        transform.position = new Vector3(clampX, -4f, 0f);

        //Shoot
        if (Input.GetButtonDown("Fire1"))
        {
            Shoot();
        }

        if(lives == 0 )
        {
            Destroy(gameObject);
        }
    }

    void Shoot()
    {
        Instantiate(bullet, spawn.position, Quaternion.identity);
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        if (collision.tag == "Bullet-E")
        {
            lives--;
        }
    }
}
