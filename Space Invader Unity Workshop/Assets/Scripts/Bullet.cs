using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Bullet : MonoBehaviour
{
    public float speed = 30f;
    // Start is called before the first frame update
    void Start()
    {
        GetComponent<Rigidbody2D>().velocity = speed * Vector2.up;
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        //Enemy bullet hits player
        if (this.tag == "Bullet-E" && collision.tag == "Player")
            Destroy(gameObject);

        //Player bullet hits a target

        if (this.tag == "Bullet-P")
            Destroy(gameObject);

        //Bullet (either enemy or player) hits the barrier
        //Destroy the bullet as well the barrier
        if(collision.tag == "Barrier")
        {
            Destroy(collision.gameObject);
            Destroy(gameObject);
        }
    }
}
