using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Enemy : MonoBehaviour
{
    public static float moveDirection = 1f;
    public GameObject bullet;
    public Transform spawnPoint;
    // Start is called before the first frame update
    void Start()
    {
        InvokeRepeating("Movement", 0f, 1f);

        //Shooting
        float randomNumber = Random.Range(2f, 8f);
        InvokeRepeating("Shoot", randomNumber, randomNumber);
    }

    // Update is called once per frame
    void Update()
    {

    }

    void Movement()
    {
        transform.position += new Vector3(0.5f * moveDirection, 0f, 0f);

        if (transform.position.x == 10f)
            Invoke("MoveLeft", 0.1f);
        else if (transform.position.x == -10f)
            Invoke("MoveRight", 0.1f);
    }

    void MoveLeft()
    {
        Enemy.moveDirection = -1f;
        ChangeDirection();
    }

    void MoveRight()
    {
        Enemy.moveDirection = 1f;
        ChangeDirection();
    }

    void ChangeDirection()
    {
        transform.parent.position += new Vector3(0f, -1f, 0f);
    }

    void Shoot()
    {
        Instantiate(bullet, spawnPoint.position, Quaternion.identity);
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        if (collision.tag == "Bullet-P")
        {
            Destroy(gameObject);
        }
    }
}
